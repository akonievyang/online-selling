<?php
    include "DAO/Online_SellingDAO.php";

?>


<div class="overlay">

    <div class="shopping_cart"  style="overflow:auto;">
        <span style="float: right;" class="closed" ><img src='images/close.png' style="border :1px dashed #bbbbbb;"/></span>
        <input type="button" id="clear_list" class="btn" value="clear list"/>
        <br/>
        <table class="table table-bordered" id="tb_cart" >
            <tr >
                <td>Name</td>
                <td>Quantity</td>
                <td>Price</td>
                <td>Total Price</td>
                <td></td>
            </tr>
            <tr>
                <tbody id="cart"></tbody>
            </tr>
        </table>
        <br/>
        <div class="right" >
            <label>Total Price:<input type="text" class="input-medium" id="total" readonly='readonly'/></label>
            <input type="button" class="btn btn-primary" id="check_out" value="check out"/>
            <br/>
            <label id="shop_more"  style="text-decoration: underline;">or shop more?</label>
        </div>
        <div style="clear: both;"></div>


    </div>
</div>
<!--- end cart --->