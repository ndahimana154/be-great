<?php
    include('connect.php');
    include('member-acting-initial-credentials.php');
?>
<div class="orders-cont">
    <div class="orders-box">
        <h2>
            Home sliding shops
        </h2>
        <div class="btnz" style="padding: 10px;">
            <a href="member-new-shop-sliding.php" class="btn btn-success">
                <i class="fa fa-plus"></i>
                new sliding shop
            </a>
        </div>
        <div class="table" style="padding: 10px; overflow:auto;">
            <table class="table table-hover table-responsive">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            From
                        </th>
                        <th>
                            Shop name
                        </th>
                        <th>
                            Message
                        </th>
                        <th>
                            Until
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $get_txns = mysqli_query($server,"SELECT *
                            FROM shops,home_sliding_shops
                            WHERE shops.shop_id = home_sliding_shops.shop
                            ORDER BY
                            sliding_from ASC
                            ,shop_name ASC
                        ");
                        if (mysqli_num_rows($get_txns) < 1) {
                            ?>
                            <tr>
                                <td colspan=100>
                                    no values!
                                </td>
                            </tr>
                            <?php
                        }
                        $id = 1;
                        while ($data_txns = mysqli_fetch_array($get_txns)) {
                            ?>
                            <tr>
                                <td>
                                    <?php
                                        echo $id++;
                                    ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['sliding_from']; ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['shop_name'] ?>
                                </td>
                                <td>
                                        <?php  echo $data_txns['sliding_message']; ?>
                                    
                                </td>
                                <td>
                                    <?php echo $data_txns['sliding_until']; ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['sliding_status']; ?>
                                </td>
                                <td>
                                    <?php
                                        if ($data_txns['sliding_status'] == 'Sliding') {
                                            ?>
                                            <a href="member-end-home-sliding-shops.php?end=<?php echo $data_txns['id'] ?>" class="btn btn-danger">
                                                <i class="fa fa-window-close"></i>
                                            </a>
                                            <?php
                                        }
                                    ?>
                                    <a href="images/shops/home-sliding/<?php echo $data_txns['sliding_image'] ?>" class="btn btn-warning">
                                        <i class="fa fa-external-link-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>