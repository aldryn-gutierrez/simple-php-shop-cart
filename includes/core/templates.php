<?php

//define('PAYPAL_BUSINESS_VALUE', 'SSS_1344248969_biz@gmail.com');
//define('PAYPAL_FORM_URL', 'https://www.sandbox.paypal.com/cgi-bin/webscr');

//Shopping Cart Templates

function render_shopping_cart_row(ShoppingCart $shopping_cart, $product_id, $line_item_counter){
         
         $quantity = $shopping_cart->GetItemQuantity($product_id);
         $amount = $shopping_cart->GetItemCost($product_id);
         $unit_cost = Product::get_item_price($product_id);

         $shipping_amount = $shopping_cart->GetItemShippingCost($product_id);

         $output = " 
            <tr>
                <td>
                    $product_id
                    <input type='hidden' name='item_name_$line_item_counter' value='$product_id' />
                </td>
                <td>
                    $quantity
                    <input type='hidden' name='quantity_$line_item_counter' value='$quantity' />
                </td>
                <td>
                    $$amount
                    <input type='hidden' name='amount_$line_item_counter' value='$unit_cost' />
                    <input type='hidden' name='shipping_$line_item_counter' value='$shipping_amount' />
                </td>
            </tr>
            
          ";

          return $output;
        }

function render_shopping_cart_shipping_row(ShoppingCart $shopping_cart){
    return "
        <tr>
            <td></td>
            <td>Shipping:</td>
            <td>
            $". $shopping_cart->GetShippingCost() ."
            </td>
        </tr>
    ";
}

function render_shopping_cart_total_row(ShoppingCart $shopping_cart){
    return "
        <tr>
            <td></td>
            <td>Total:</td>
            <td>
            $". $shopping_cart->GetTotal() ."
            </td>
        </tr>
    ";
}

function render_shopping_cart(ShoppingCart $shopping_cart){

$output = "<table class='shoppingCart'>
    <tr>
        <th>Product ID</th>
        <th>Quantity</th>
        <th>Amount</th>
    </tr>";


     $line_item_counter = 1;
     foreach ($shopping_cart->GetItems() as $product_id) {
        $output .= render_shopping_cart_row($shopping_cart, $product_id, $line_item_counter);
        $line_item_counter++;
     }

     $output .= render_shopping_cart_shipping_row($shopping_cart);
     $output .= render_shopping_cart_total_row($shopping_cart);

$output .= "</table>";

return $output;

}

function render_paypal_checkout(ShoppingCart $shopping_cart){
    return "<form action='https://www.sandbox.paypal.com/cgi-bin/webscr' method='POST'>
        <input type='hidden' name='business' value='SSS_1344248969_biz@gmail.com' />
        <input type='hidden' name='cmd' value='_cart' />
        <input type='hidden' name='upload' value='1' />
        <input type='hidden' name='currency_code' value='USD' />
        <input type='hidden' name='lc' value='US' />

        ". render_shopping_cart($shopping_cart) ." 

        <input type='image' name='submit' src='https://www.paypal.com/en_US/i/btn/btn_buynow_LG.gif' />
    </form>";
}



