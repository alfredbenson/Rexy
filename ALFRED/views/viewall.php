<?php
include_once __DIR__ . "/../config/database.php";

 if (isset($_GET['user_id'])) {
    $id = $_GET['user_id'];
    $sql = "SELECT * FROM personal_information WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$row) {
    die("Record not found.");
}

$lastName = $row['last_name'];
$firstName = $row['first_name'];
$middleInitial = $row['middle_initial'];
$dob = $row['date_of_birth'];
$age = $row['age'];
$sex = $row['sex'];
$status = $row['civil_status'];
$tin = $row['tin'];
$nationality = $row['nationality'];
$religion = $row['religion'];

$pob_unit_bldg = $row['pob_unit_bldg'];
$pob_house_lot_blk = $row['pob_house_lot_blk'];
$pob_street_name = $row['pob_street_name'];
$pob_subdivision = $row['pob_subdivision'];
$pob_barangay = $row['pob_barangay'];
$pob_city_municipality = $row['pob_city_municipality'];
$pob_province = $row['pob_province'];
$pob_country = $row['pob_country'];
$pob_zipcode = $row['pob_zipcode'];

$home_unit_bldg = $row['home_unit_bldg'];
$home_house_lot_blk = $row['home_house_lot_blk'];
$home_street_name = $row['home_street_name'];
$home_subdivision = $row['home_subdivision'];
$home_barangay = $row['home_barangay'];
$home_city_municipality = $row['home_city_municipality'];
$home_province = $row['home_province'];
$home_country = $row['home_country'];
$home_zipcode = $row['home_zipcode'];

$cell = $row['cell'];
$email = $row['email'];
$tel = $row['tel'];

$father_lname = $row['father_lname'];
$father_fname = $row['father_fname'];
$father_mi = $row['father_mi'];
$mother_lname = $row['mother_lname'];
$mother_fname = $row['mother_fname'];
$mother_mi = $row['mother_mi'];
 }
 else {
    die("Record not found.");
 }
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Submitted Form Data</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-blue-100">
  <div class="max-w-4xl mx-auto mt-10 p-8 bg-white shadow-md rounded-xl">
  <div class="flex justify-start mb-4">
        <a href="index.php" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700"><-Back</a>
    </div>
    <h1 class="text-2xl font-bold text-center">Submitted Information</h1>

   
<table class="table-auto w-full mt-6 border-collapse border border-gray-400">
  <thead>
    <tr class="bg-gray-200">
      <th class="border border-gray-400 px-4 py-2">Personal Data</th>
    </tr>
  </thead>
  <tbody>
    <tr><td class="border px-4 py-2">Full Name</td><td class="border px-4 py-2"><?php echo "$lastName, $firstName $middleInitial."; ?></td></tr>
    <tr><td class="border px-4 py-2">Date of Birth</td><td class="border px-4 py-2"><?php echo $dob; ?></td></tr>
    <tr><td class="border px-4 py-2">Age</td><td class="border px-4 py-2"><?php echo $age; ?></td></tr>
    <tr><td class="border px-4 py-2">Sex</td><td class="border px-4 py-2"><?php echo $sex; ?></td></tr>
    <tr><td class="border px-4 py-2">Civil Status</td><td class="border px-4 py-2"><?php echo $status; ?></td></tr>
    <tr><td class="border px-4 py-2">Tax Identification Number</td><td class="border px-4 py-2"><?php echo $tin; ?></td></tr>
    <tr><td class="border px-4 py-2">Nationality</td><td class="border px-4 py-2"><?php echo $nationality; ?></td></tr>
    <tr><td class="border px-4 py-2">Religion</td><td class="border px-4 py-2"><?php echo $religion; ?></td></tr>

    <tr class="bg-gray-200"><th class="border border-gray-400 py-2">Place of Birth</th></tr>
    <tr><td class="border px-4 py-2">Unit/Bldg</td><td class="border px-4 py-2"><?php echo $pob_unit_bldg; ?></td></tr>
    <tr><td class="border px-4 py-2">House/Lot & Blk</td><td class="border px-4 py-2"><?php echo $pob_house_lot_blk; ?></td></tr>
    <tr><td class="border px-4 py-2">Street Name</td><td class="border px-4 py-2"><?php echo $pob_street_name; ?></td></tr>
    <tr><td class="border px-4 py-2">Subdivision</td><td class="border px-4 py-2"><?php echo $pob_subdivision; ?></td></tr>
    <tr><td class="border px-4 py-2">Barangay</td><td class="border px-4 py-2"><?php echo $pob_barangay; ?></td></tr>
    <tr><td class="border px-4 py-2">City/Municipality</td><td class="border px-4 py-2"><?php echo $pob_city_municipality; ?></td></tr>
    <tr><td class="border px-4 py-2">Province</td><td class="border px-4 py-2"><?php echo $pob_province; ?></td></tr>
    <tr><td class="border px-4 py-2">Country</td><td class="border px-4 py-2"><?php echo $pob_country; ?></td></tr>
    <tr><td class="border px-4 py-2">Zip Code</td><td class="border px-4 py-2"><?php echo $pob_zipcode; ?></td></tr>

    <tr class="bg-gray-200"><th class="border border-gray-400 py-2">Home Address</th></tr>
    <tr><td class="border px-4 py-2">Unit/Bldg</td><td class="border px-4 py-2"><?php echo $home_unit_bldg; ?></td></tr>
    <tr><td class="border px-4 py-2">House/Lot & Blk</td><td class="border px-4 py-2"><?php echo $home_house_lot_blk; ?></td></tr>
    <tr><td class="border px-4 py-2">Street Name</td><td class="border px-4 py-2"><?php echo $home_street_name; ?></td></tr>
    <tr><td class="border px-4 py-2">Subdivision</td><td class="border px-4 py-2"><?php echo $home_subdivision; ?></td></tr>
    <tr><td class="border px-4 py-2">Barangay</td><td class="border px-4 py-2"><?php echo $home_barangay; ?></td></tr>
    <tr><td class="border px-4 py-2">City/Municipality</td><td class="border px-4 py-2"><?php echo $home_city_municipality; ?></td></tr>
    <tr><td class="border px-4 py-2">Province</td><td class="border px-4 py-2"><?php echo $home_province; ?></td></tr>
    <tr><td class="border px-4 py-2">Country</td><td class="border px-4 py-2"><?php echo $home_country; ?></td></tr>
    <tr><td class="border px-4 py-2">Zip Code</td><td class="border px-4 py-2"><?php echo $home_zipcode; ?></td></tr>

    <tr class="bg-gray-200"><th class="border border-gray-400 py-2">Parents</th></tr>
    <tr><td class="border px-4 py-2">Father</td><td class="border px-4 py-2"><?php echo "$father_lname, $father_fname $father_mi."; ?></td></tr>
    <tr><td class="border px-4 py-2">Mother</td><td class="border px-4 py-2"><?php echo "$mother_lname, $mother_fname $mother_mi."; ?></td></tr>
  </tbody>
</table>

   
  </div>
</body>
</html>