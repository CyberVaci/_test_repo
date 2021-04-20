<div class="row">
  <div class="col-12">

    <div class="card-box">
      <div class="table-rep-plugin">
        <div class="table-responsive" data-pattern="priority-columns">
          <table id="tech-companies-1" class="table  table-striped">
            <thead>
            <tr>
              <th></th>
              <th>#</th>
              <th>ტოკენი</th>
              <th>შექმნის თარიღი</th>
              <th>ვალიდურია</th>

            </tr>
            </thead>
            <tbody>

            <?php
            $result = $db->query("SELECT `id`, `token`, `create_date`, `valid_to`, `status` FROM `token` ORDER BY `create_date` DESC");
            while ($row = $result->fetch_assoc())
            {
              if ($row["status"] == 1)
                $status = '<a href="#" onclick="changeStatus('.$row["id"].');return false;"><i class="fa fa-remove"></i></a>';
              else $status = '<span class="badge badge-danger">disabled</span>';
              ?>
              <tr>
                <td id="action_<?=$row['id']?>">
                    <?=$status?>
                </td>
                <td><?= $row["id"] ?></td>
                <td id="token_<?=$row['id']?>">
                  <a href="#" onclick="tokenView(<?=$row['id']?>,'<?=$row["token"]?>');return false;" title="<?=$row["token"]?>">
                    <?= substr($row["token"],0,30); ?>...
                  </a>
                </td>
                <td><?= $row["create_date"] ?></td>
                <td><span class="badge badge-"><?= $row["valid_to"] ?></span></td>
              </tr>
              <?php
            }
            ?>

            </tbody>
          </table>
        </div>

      </div>

    </div>
  </div>
</div>

