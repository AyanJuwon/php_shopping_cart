<?php

foreach ($products as $product){


    // $rating = $rating->get_average_rating($product->id);
 
    // creating box
    echo "<div class='col-md-4 m-b-20px'>";
 
        // product id for javascript access
        echo "<div class='product-id  display-none' style='display:none;'>{$product->id}</div>";
 
        echo "<a href='product.php?id={$product->id}' class='product-link'>";
            // select and show first product image
            $getProductimage = $productImage->find_product_image_by_id($product->id);
//            echo $getProductimage;

//            $ =$product_image->readFirst();
 
//            foreach ($getProductimage as $product_image){
                echo "<div class='m-b-10px'>";
                    echo "<img src='src/uploads/images/{$getProductimage->name}' class='w-100-pct' />";
                echo "</div>";
//            }
    
            // product name
            echo "<div class='product-name m-b-10px'>{$product->name}</div>";
        echo "</a>";
 
        // product price and category name
            echo "<div class='m-b-10px'>";
                echo "$" . number_format($product->price, 2, '.', ',');
            echo "</div>";
            echo "Average rating:  <strong>" . round($rating->get_average_rating($product->id), 2) . "</strong> based on <strong>" . $rating->get_average_rating_count($product->id) . "</strong> users";
 
            // add to cart button
            echo "<div class='m-b-10px'>";
                // cart item settings
//                $cart_item->user_id = 1; // we default to a user with ID "1" for now
//                $cart_item->product_id= $id;
 
                // if product was already added in the cart
                if($cart_item->exists($product->id)){
                    echo "<a href='cart.php' class='btn btn-success w-100-pct'>";
                        echo "Update Cart";
                    echo "</a>";
                }else{
                    echo " <form class='product-form' method='POST'>
                    <input type='hidden' id='id' name = 'id' value =$product->id >
                    <button  class='btn btn-primary w-100-pct' type='submit'>Add to Cart</button>
                     </form>";
                     
                    //  <a href='add_to_cart.php?id={$id}&page={$page}' class='btn btn-primary w-100-pct'>Add to Cart</a>";
                }
            echo "</div>";
 
    echo "</div>";
}
