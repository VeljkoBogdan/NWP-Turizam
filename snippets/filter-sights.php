<?php
if (isset($_GET['search'])) {
    $category = null;
    $location = null;
    $fee = null;
    $any = false;
    if(isset($_GET['categories']) && $_GET['categories'] != "") {
        $category = $_GET['categories'];
        $any = true;
    }
    if(isset($_GET['locations']) && $_GET['locations'] != "") {
        $location = $_GET['locations'];
        $any = true;
    }
    if(isset($_GET['fee']) && $_GET['fee'] != "") {
        switch ($_GET['fee']){
            case -1: $fee = "> -1"; break;
            case 0: $fee = "< 10"; break;
            case 1: $fee = "< 50"; break;
            case 2: $fee = "> 50"; break;
        }
        $any = true;
    }
    $sql = "SELECT * FROM sights" .
        ($category == null ? "" : " WHERE id_category = " . $category) .
        ($location == null ? "" : ($category == null ? " WHERE" : " AND") . " id_city = " . $location) .
        ($fee == null ? "" : ($category == null && $location == null ? " WHERE" : " AND") . " fee " . $fee);

    $query = $pdo->query($sql);

    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        echo '<a class="recommended-cities-a" href="sight.php?id='.$row['id_sight'].'">
                                <div class="recommended-cities city-card">
                                    <h2>'.$row['name'].', <br></h2><h4> '.$row['address'].'</h4>
                                    <p>Description: '.$row['description'].'</p>
                                </div>
                            </a>';
    }
}
?>