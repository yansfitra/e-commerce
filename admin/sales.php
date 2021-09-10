<h4 class="card-title">Sales List</h4>
    <div class="table-responsive" style="margin-top: 12px;">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Order ID</th>
                    <th>Username</th>
                    <th>Date</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php $number=1;?>
                <?php $pick=$connect->query("SELECT * FROM sales JOIN user ON sales.user_id=user.user_id"); ?>
                <?php while($row=$pick->fetch_assoc()){?>
                <tr>
                    <th><?php echo $number; ?></th>
                    <th><?php echo $row['order_id']; ?></th>
                    <th><?php echo $row['username']; ?></th>
                    <th><?php echo $row['date']; ?></th>
                    <th><?php echo $row['order_total']; ?></th>
                </tr>
                <?php $number++; ?>
                <?php 
                } ?>

            </tbody>
        </table>
    </div>