<?php

?>

<div class="view_item">
    <input type="text" class="search-query input-medium" id="search" placeholder="search"/>

    <hr>

    <table  class="table table-bordered table-hover ">
        <tr>
            <td></td>
            <td>Item</td>
            <td>Brand</td>
            <td>Cost</td>
            <td>Action</td>
        </tr>
        <tr>
            <tbody id="items"></tbody>
        </tr>
    </table>
    <input type="button" id="delete_item" value="delete" class="btn btn-primary"/>
    <input type="button" id='display_add' value="add more item" class="btn btn-primary"/>
</div>