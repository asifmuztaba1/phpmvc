<div class="container">
    <h2>List of Buyers</h2>
    <input type="date" id="reportFilterInput" onchange="reportFilter()" placeholder="Search for Items" title="Type">
    <div class="table-container">
        <table id="reportFilterTable">
            <tr class="header">
                <th style="">Sl No</th>
                <th style="">Amount</th>
                <th style="">Buyer Name</th>
                <th style="">Items</th>
                <th style="">Buyer Email</th>
                <th style="">Buyer IP</th>
                <th style="">Note</th>
                <th style="">City</th>
                <th style="">Phone</th>
                <th style="">Hash Key</th>
                <th style="">Entry At</th>
                <th style="">Entry By</th>
            </tr>
            <?php
            foreach ($data as $dt):
                ?>
                <tr>
                    <td><?=$dt->id?></td>
                    <td><?=$dt->amount?></td>
                    <td><?=$dt->buyer?></td>
                    <td><?=$dt->items?></td>
                    <td><?=$dt->buyer_email?></td>
                    <td><?=$dt->buyer_ip?></td>
                    <td><?=$dt->note?></td>
                    <td><?=$dt->city?></td>
                    <td><?=$dt->phone?></td>
                    <td><?=$dt->hash_key?></td>
                    <td><?=$dt->entry_at?></td>
                    <td><?=$dt->entry_by?></td>
                </tr>
            <?php
            endforeach;
            ?>
        </table>
    </div>
</div>
