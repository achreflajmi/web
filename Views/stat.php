<?php
// Set up database connection
$dsn = 'mysql:host=localhost;dbname=events';
$username = 'root';
$password = '';
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);
$db = new PDO($dsn, $username, $password, $options);

// Retrieve number of events in each category
$categories = array('Théatre', 'Musique', 'Cinéma', 'Camping');
$category_counts = array();
$total_count = 0;
foreach ($categories as $category) {
    $stmt = $db->prepare("SELECT COUNT(*) FROM `formulaire` WHERE categorie = :category");
    $stmt->bindValue(':category', $category, PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->fetchColumn();
    $category_counts[$category] = $count;
    $total_count += $count;
}

// Calculate percentage of events in each category compared to total number of events
$category_percentages = array();
foreach ($category_counts as $category => $count) {
    $percentage = round(($count / $total_count) * 100, 2);
    $category_percentages[$category] = $percentage;
}

// Display statistics with CSS
echo "<style>
.event-stats .category-bar {
    display: flex;
    align-items: center;
    height: 30px;
    background-color: #eee;
    border-radius: 10px;
    overflow: hidden;
    margin-bottom: 5px;
    position: relative;
    padding-left: 100px; /* add padding on the left to make space for the category name */
}

.event-stats .category-fill {
    width: 0%;
    height: 100%;
    background-color: rgba(205, 164, 94, 0.5);
    position: absolute;
    top: 0;
    left: 0px; /* set left position to 100px to align with padding */
    transition: all 0.5s ease-in-out;
}

.event-stats .category-name {
    font-weight: bold;
    margin-right: 10px;
    margin-left: 550px;
    position: absolute;
    left: 0;
    width: 100px; /* set a fixed width for the category name container */
    text-align: right; /* align text to the right */
}

.event-stats .category-percentage {
    font-weight: bold;
    display: inline-block;
    left: 10px;
    top: 50%;
    transform: translateY(-50%);
    position: absolute;
}
.event-stats h2 {
    font-size: 2em;
    margin-bottom: 10px;
    text-align: center; /* center the text */
  }
  
  .event-stats p {
    color:#cda45e;
    margin-bottom: 10px;
    font-weight: bold;
    text-align: center; /* center the text */
  }

</style>";

echo "<div class='event-stats'>";
echo "<h2>Event Statistics</h2>";
echo "<p>Total Number of Events: " . $total_count . "</p>";
foreach ($category_percentages as $category => $percentage) {
    $bar_width = round($percentage, 1) . '%';
    echo "<div class='category-bar'>";
    echo "<span class='category-name'>" . $category . "</span>";
    echo "<span class='category-percentage'>" . $percentage . "%</span>";
    echo "<span class='category-fill' style='width: " . $bar_width . "'></span>";

    echo "</div>";
}
echo "</div>";
?>
