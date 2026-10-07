/* =========================================================
   ELITE GADGET STORE JAVASCRIPT
   ========================================================= */


/*
|--------------------------------------------------------------------------
| Page Loaded
|--------------------------------------------------------------------------
*/

document.addEventListener(
    "DOMContentLoaded",
    function () {

        console.log(
            "Elite Gadget Store loaded successfully."
        );

    }
);


/*
|--------------------------------------------------------------------------
| Confirm Delete
|--------------------------------------------------------------------------
*/

function confirmDelete(message = "Are you sure?")
{
    return confirm(message);
}


/*
|--------------------------------------------------------------------------
| Mobile Menu
|--------------------------------------------------------------------------
*/

function toggleMenu()
{
    const menu =
        document.getElementById("mobileMenu");

    if (menu) {

        menu.classList.toggle("active");

    }
}


/*
|--------------------------------------------------------------------------
| Quantity Increase
|--------------------------------------------------------------------------
*/

function increaseQuantity(inputId)
{
    const input =
        document.getElementById(inputId);

    if (input) {

        input.value =
            parseInt(input.value || 1) + 1;

    }
}


/*
|--------------------------------------------------------------------------
| Quantity Decrease
|--------------------------------------------------------------------------
*/

function decreaseQuantity(inputId)
{
    const input =
        document.getElementById(inputId);

    if (input) {

        let value =
            parseInt(input.value || 1);

        if (value > 1) {

            input.value = value - 1;

        }

    }
}


/*
|--------------------------------------------------------------------------
| Image Preview
|--------------------------------------------------------------------------
*/

function previewImage(input, previewId)
{
    const preview =
        document.getElementById(previewId);

    if (
        input.files &&
        input.files[0] &&
        preview
    ) {

        const reader =
            new FileReader();

        reader.onload = function (event) {

            preview.src =
                event.target.result;

        };

        reader.readAsDataURL(
            input.files[0]
        );

    }
}


/*
|--------------------------------------------------------------------------
| Auto Hide Alert
|--------------------------------------------------------------------------
*/

setTimeout(
    function () {

        const alerts =
            document.querySelectorAll(".alert");

        alerts.forEach(
            function (alert) {

                alert.style.opacity = "0";

                setTimeout(
                    function () {

                        alert.remove();

                    },
                    500
                );

            }
        );

    },
    5000
);