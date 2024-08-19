<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="styles.css">
<script>
    import 'bs5-lightbox';
</script>
<style>
    .card:hover {
          background-color:black;
          color:white;
          box-shadow: #d9d7d4 2px 3px;
          transform: scale(1.1); /* Increase image size on hover */
    transition: transform 0.3s ease; 
    }
    body{
        background-color: #dfdee3
    }
    
</style>

<?php

$apiUrl = 'https://localhost/woo-connerence/wp-json/wc/v3/products';
$consumerKey = 'ck_60a30673456201fd73e544478c054945ae093826';
$consumerSecret = 'cs_3f3c6be3f9e392a86189e916088d9563f4142ca3';

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERPWD, $consumerKey . ':' . $consumerSecret);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
    curl_close($ch);
    exit;
}
curl_close($ch);
$products = json_decode($response);
if (json_last_error() !== JSON_ERROR_NONE || empty($products)) {
    echo 'Error: Unable to fetch products or no products found.';
    exit;
}

echo "<div class='container'>";
echo "<div class='row mt-4' style='border:7px #b7b7b7 double;padding:20px'>";
echo "<h1 class='text-center ' style='text-decoration:underline;color:#3c421f; '>Products List</h1>";
foreach ($products as $product) {

    echo "<div class='col-md-4 mt-4'>";
    echo "<div class='card'>";
    echo '
    <a  href="'.$product->images[0]->src.'" data-toggle="lightbox">
<img class="card-img-top imageHover " src="' . $product->images[0]->src . '" alt="Card image" style="width:100%;height:217px"></a>
    
    
    ';
    echo "<div class='card-body'>";
    echo "<h6 class='card-title'>";
    echo $product->name;
    echo "</h6>";
    echo "</div>";
    echo "<div class='card-footer'>";
    $words = explode(' ', $product->description);
    $first50Words = array_slice($words, 0, 50);
    $first50WordsString = implode(' ', $first50Words);
    echo $first50WordsString;
    echo "<a class='btn btn-primary float-end mt-2' href='delete.php?id=" . ($product->id) . "'>Delete Product</a>";
    echo "</div>";

    echo "</div>";
    echo "</div>"; 
}

echo "</div>";
echo "</div>";

?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bs5-lightbox@1.8.3/dist/index.bundle.min.js"></script>
