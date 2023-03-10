        <!-- cat -->
        <ol class="list-group">
          <li class="list-group-item d-flex justify-content-between align-items-start ">
            <b>All Categories</b>
          </li>
          <?php
          $c = "select categories.*,count(*) as total from categories,articles where articles.category_id=categories.id  group by articles.category_id;";
          $cr = $conn->query($c);
          while ($row = $cr->fetch_assoc()) {
          ?>

            <li class="list-group-item d-flex justify-content-between align-items-start">

              <div class="ms-1 me-auto">
                <a style="text-decoration: none" href="category.php?id=<?= $row['id'] ?>">
                  <div class="fw-bold"><?= $row['icon'] ?> <?= $row['name'] ?></div>
                </a>
              </div>
              <span class="badge bg-primary rounded-pill"><?= $row['total'] ?></span>
            </li>
          <?php } ?>

        </ol>
        <!-- cat ends -->