<div class="row">
    <div class="col-12">

        <div class="card-box">
            <div class="table-rep-plugin">
                <div class="table-responsive" data-pattern="priority-columns">
                    <table id="tech-companies-1" class="table  table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>მომხმარებელი</th>
                            <th>შექმნის თარიღი</th>
                            <th>სტატუსი</th>
                            <th>მისამართი</th>
                            <th>თანხა</th>
                            <th>მობილური</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        $result = $db->query("select ord.id,
                                                     u.username,
                                                    ord.create_date,
                                                    os.name,
                                                    ord.address,
                                                    ord.mobile,
                                                    ord.amount,
                                                    ord.status
                                                    from `order` ord
                                                    INNER JOIN order_status os on `ord`.status = os.id
                                                    INNER JOIN users u on `ord`.user_id = u.id
                                                    ORDER BY create_date DESC");
                        $SumQuantity = 0;
                        $SumAmount = 0;
                        while ($row = $result->fetch_assoc())
                        {
                            if ($row["status"] == 1) $status = "warning"; else $status = "danger";
                        ?>
                        <tr>
                                    <td><?= $row["id"] ?></td>
                                    <td><?= $row["username"] ?></td>
                                    <td><?= $row["create_date"] ?></td>
                                    <td><span class="badge badge-<?=$status?>"><?= $row["name"] ?></span></td>
                                    <td><?= $row["address"] ?></td>
                                    <td><?= $row["amount"] ?></td>
                                    <td><?= $row["mobile"] ?></td>
                                </tr>
                        <?php
                                $SumAmount += $row["amount"];
                                }
                                ?>
                        <tr >
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>ჯამი ღირებულება</th>
                            <th style="background-color: #FF7059 !important;color:#fff !important;"><?= $SumAmount?></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
</div>
