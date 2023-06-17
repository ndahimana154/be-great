<?php
    include('connect.php');
    include('member-acting-initial-credentials.php');
?>
<div class="orders-cont">
    <div class="orders-box">
        <h2>
            MEMBERS LIST
        </h2>
        <div class="ctrls" style="padding: 10px">
            <a href="member-new-member.php" class="btn btn-success">
                <i class="fa fa-plus"></i> &nbsp;
                new member
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
                            Member id
                        </th>
                        <th>
                            Username
                        </th>
                        <th>
                            Names
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Phone number
                        </th>
                        <th>
                            Member type
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
                        $get_txns = mysqli_query($server,"SELECT
                            * from 
                            co_members,co_members_auth
                            WHERE co_members.id = co_members_auth.id
                            
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
                                    <?php 
                                        echo $data_txns['id']; 
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        echo $data_txns['username']; 
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        echo $data_txns['Fname']." ".$data_txns['Lname']; 
                                    ?>
                                </td>
                                <td>
                                    <a href="mailto:<?php echo $data_txns['Email'];?>" target="_blank">
                                        <?php 
                                            echo $data_txns['Email']; 
                                        ?>
                                    </a>
                                    
                                </td>
                                <td>
                                    <?php
                                        echo $data_txns['Phone'];
                                    ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['Type']; ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['Status'] ?>
                                </td>
                                <td>
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