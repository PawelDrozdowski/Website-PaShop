<?php
    $total_cost = $shipment_cost + $products_cost;
    echo
        "<div class='purchase-details'>
            <div>
                <form action='cart-delivery.php'>
                    <span class='purchase-summary purchase-summary-first'>Products:</span>
                    <span id='products-cost' class='purchase-cost'>$$products_cost</span>
                    <span class='purchase-summary'>Shipment:</span>
                    <span id='shipment-cost' class='purchase-cost'>$$shipment_cost</span>
                    <hr class='hr-solid'>
                    <span class='purchase-summary'>Total:</span>
                    <span id='total-cost' class='purchase-cost'>$$total_cost</span>
                    <div class='inputs-group'>
                        <input type='submit' class='purchase-details-btn details-purchase-btn' value='Continue'>
                        <span class='purchase-details-agreement'>By clicking “Continue” you agree with 
                            <a href='#'>Terms of Service</a>
                        </span>
                    </div>
                </form>
            </div>
        </div>";
?>