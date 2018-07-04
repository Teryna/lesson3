<?
error_reporting(E_ALL);

$animals = [
    'Africa' => ['Canis adustus', 'Hippotragus leucophaeus', 'Philantomba monticola'],
    'America' => ['Alopex lagopus', 'Panthera onca', 'Ursus americanus'],
    'Antarctica' => ['Hydrurga leptonyx', 'Balaenopteridae', 'Hyperoodon'],
    'Austalia' => ['Thylacinus cynocephalus', 'Ornithorhynchus anatinus', 'Antechinus'],
    'Eurasia' => ['Martes zibellina', 'Meles leucurus', 'Mustela nivalis']
];

$result = [];
$firstWord = [];
$secondWord = [];

foreach ($animals as $continent => $animal) {
    $result[$continent] = [];
    foreach ($animal as $newAnimal) {
        $res = explode(' ', $newAnimal);
        if (count($res) == 2) {   
            $firstWord[] = $continent .' '. $res[0];
            $secondWord[] = $res[1];
        }
    }
}

shuffle($secondWord);

$fantasticName = [];

for ($i = 0; $i < count($firstWord); $i++) {
    $fantasticName[] = $firstWord[$i] .' '. $secondWord[$i];
}

foreach ($result as $continent => $animals) {
    foreach ($fantasticName as $newAnimal) {
        $res = explode(' ', $newAnimal);
        if ($res[0] == $continent) {
            $result[$continent][] = $res[1] .' '. $res[2];
        }
    }
}

//print_r ($fantasticName);
//print_r ($result);

?>
    
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Строки, массивы и объекты</title>
        <style>
            body {
                font-family: sans-serif;  
                max-width: 1200px;
                margin: 0 auto;
                padding: 20px 30px;
            }
        </style>
</head>
<body>

<? 
echo "<h1>Список фантазийных животных</h1>";
foreach ($result as $continent => $animals) {
     $fantasticAnimal = implode(', ', $animals);
echo "<h2>$continent</h2>
      <p>$fantasticAnimal</p>";            
} 
?>
    
</body>
</html>



