<!-- tìm kiếm sản phẩm -->
<?php
include('db.php');
$sql = "SELECT * FROM `food` WHERE title LIKE '%" . $_POST['name'] . "%'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		$id = $row['id'];
		$title = $row['title'];
		$price = $row['price'];
		$price_2 = $row['price_2'];
		if ($price_2 < 10) {
			$price_2 = '00' . $price_2;
		} else if ($price_2 < 100) {
			$price_2 = '0' . $price_2;
		}
		
		$desc = $row['desc'];
		$image = $row['image'];
		$pro = $row['pro'];
		$price_3 = ($price * 1000 + $price_2) - ($price * 1000 + $price_2) * $pro / 100;
		if ($price_3 % 1000 < 10) {
			$price_4 = floor($price_3 / 1000) . ".00" . ($price_3 % 1000);
		} else if ($price_3 % 1000 < 100) {
			$price_4 = floor($price_3 / 1000) . ".0" . ($price_3 % 1000);
		} else {
			$price_4 = floor($price_3 / 1000) . "." . ($price_3 % 1000);
		}
		// hiển thị sản phẩm
		echo "
        <div class='main__eat__search'>
            <img src='./img/$image' alt='' />
            <a href='./details.php?id=$id'>$title</a>
            <div class='main__money__search'>
              <span>$price_4</span>
            </div>
	  </div>
	  ";
	}
} else {
	echo "<tr><td>0 có sản phẩm</td></tr>";
}
