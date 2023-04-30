const apiUrl = "https://world.openfoodfacts.org/api/v0/product/";

function getProductDetails(barcode) {
  return fetch(apiUrl + barcode + ".json")
    .then((response) => {
      if (!response.ok) {
        if (response.status === 429) {
          throw new Error(
            "Too many requests. Please wait and try again later."
          );
        }
        throw new Error("Network response was not ok");
      }
      return response.json();
    })
    .then((data) => {
      const product = data.product;
      return {
        name: product.product_name || "",
        number: product.code || "",
        manufacturingDate: product.manufacturing_date || "",
        expiryDate: product.expiration_date || "",
      };
    })
    .catch((error) => {
      console.error("Error retrieving product details:", error);
      return null;
    });
}

function scanBarcode() {
  const fileInput = document.querySelector('input[type="file"]');
  const file = fileInput.files[0];
  if (!file) {
    return;
  }
  const img = new Image();
  img.onload = function () {
    const canvas = document.createElement("canvas");
    const ctx = canvas.getContext("2d");
    canvas.width = this.naturalWidth;
    canvas.height = this.naturalHeight;
    ctx.drawImage(this, 0, 0);
    const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
    Quagga.decodeSingle(
      {
        decoder: {
          readers: ["ean_reader"],
        },
        locate: true,
        src: canvas.toDataURL(),
      },
      (result) => {
        if (result && result.codeResult) {
          getProductDetails(result.codeResult.code).then((product) => {
            if (product) {
              // hide the manual input form
              addProuctFormAutomatic.style.display = "none";
              // show the automatic input form
              addProuctFormManual.style.display = "flex";
              modalContent.innerHTML = addProuctFormManual.outerHTML;
              // populate the form with the product details
              const productNameInput = document.getElementById("product-name");
              const barcodeNumberInput =
                document.getElementById("product-number");
              const manufacturingDateInput = document.getElementById("DoM");
              const expiryDateInput = document.getElementById("DoE");

              productNameInput.value = product.name;
              barcodeNumberInput.value = product.number;
              manufacturingDateInput.value = product.manufacturingDate;
              expiryDateInput.value = product.expiryDate;
            } else {
              console.log("Product details not found");
            }
          });
        } else {
          console.log("Barcode not detected");
        }
      }
    );
  };
  img.src = URL.createObjectURL(file);
}
