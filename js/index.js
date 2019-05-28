(function ($) { // Begin jQuery
    $(function () { // DOM ready
        // If a link has a dropdown, add sub menu toggle.
        $('nav ul li a:not(:only-child)').click(function (e) {
            $(this).siblings('.nav-dropdown').toggle();
            // Close one dropdown when selecting another
            $('.nav-dropdown').not($(this).siblings()).hide();
            e.stopPropagation();
        });
        // Clicking away from dropdown will remove the dropdown class
        $('html').click(function () {
            $('.nav-dropdown').hide();
        });
        // Toggle open and close nav styles on click
        $('#nav-toggle').click(function () {
            $('nav ul').slideToggle();
        });
        // Toggle open and close nav styles on click
        $('.resizeDrop').click(function () {
            $('.resizeDropContent').slideToggle();
        });
        // Hamburger to X toggle
        $('#nav-toggle').on('click', function () {
            this.classList.toggle('active');
        });
    }); // end DOM ready
})(jQuery); // end jQuery

function openTab(evt, tabName) { //vertical tabs start
    var i, tabcontent, tablinks; //create variables
    //hide tab content
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    //Make tablinks inactive
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace("active", "");
    }
    //Show clicked tab
    document.getElementById(tabName).style.display = "block";
    //Activate clicked tab
    evt.currentTarget.className += "active";
}
$(document).ready(function () {
    if (window.location.href.indexOf("home") > -1) {
        //Wait for click
        document.getElementById("whoAreWe").click();
    }
});

$(document).ready(function () {
    
    $('#txtDecrease').click(function () {modifyFontSize('decrease'); });
    $('#txtNorm').click(function () {modifyFontSize('reset'); });
    $('#txtIncrease').click(function () {modifyFontSize('increase'); })
    
    function modifyFontSize(flag) {
        var divElement = $('.content');
        var currentFontSize = parseInt(divElement.css('font-size'));
        
        if (flag == 'increase')
            currentFontSize += 1;
        else if (flag == 'decrease')
            currentFontSize -= 1;
        else if (flag == 'reset')
            currentFontSize = 16;
        
        divElement.css('font-size', currentFontSize);
        sessionStorage.setItem('fontSize', currentFontSize);
    }
    if (sessionStorage.length !== 0) {
            $('.content').css('font-size', parseInt(sessionStorage.getItem('fontSize')));
        }
    
    //display products
    $.get("ajax/sort.php", function (data) {
        $("#products").html(data);
    });

    //display products in new order
    $('#order').change(function () {
        $.post("ajax/sort.php", {
                order: $(this).val()
            })
            .done(function (data) {
                $("#products").html(data);
            });
    });

    //add to cart
    $("body").delegate("#product", "click", function (event) {
        event.preventDefault;
        var productID = $(this).attr('pid');
        $.post("ajax/cart.php", {
            productID: productID
        })
        .success(function (data) {
                $("#msg").html(data);
            });
    });
    
    //display cart
    cartDisplay();
    function cartDisplay(){
         $.post("ajax/checkout.php", {
            cart: 1
        })
        .success(function (data) {
                $("#cartTbl").html(data);
                 cartTotal();
            });
    }
    //calculate total of cart
    function cartTotal(){
         $.post("ajax/checkout.php", {
            total: 1
        })
        .success(function (data) {
                $("#cartTotal").html(data);
            });
    }
    //calculate cart
    $("body").delegate(".qty", "keyup", function (event) {
        var pid = $(this).attr("pid");
        var qty = $("#qty-"+pid).val();
        var price = $("#price-"+pid).val();
        var total = qty * price;
        $("#total-"+pid).val(total);
    });
    //remove from cart
    $("body").delegate("#remove", "click", function (event) {
        event.preventDefault();
        var pid = $(this).attr("remove_id");
        $.post("ajax/checkout.php", {
            removeID: pid
        })
        .success(function (data) {
                $("#cartTbl").html(data);
                cartDisplay();
            });
    });
    //update quantity in cart
    $("body").delegate(".update", "click", function (event) {
        event.preventDefault();
        var pid = $(this).attr("update_id");
        var qty = $("#qty-"+pid).val();
        var price = $("#price-"+pid).val();
        var total = $("#total-"+pid).val();
        $.post("ajax/checkout.php", {
            updateID: pid, qty:qty, price:price, total:total
        })
        .success(function (data) {
                $("#cartTbl").html(data);
                cartDisplay();
            });
    });
});
