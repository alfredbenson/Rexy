<?php
include_once __DIR__ . "/../config/database.php";

function validateDOB($dob) {
  if (empty($dob)) {
      return "Date of birth is required.";
  }

  $dobDate = DateTime::createFromFormat('Y-m-d', $dob);
  if (!$dobDate || $dobDate->format('Y-m-d') !== $dob) {
      return "Invalid date format.";
  }

  $today = new DateTime();
  $age = $today->diff($dobDate)->y;
  if ($age < 0) {
      return "Invalid date of birth.";
  }
  return $age;
}

// Get the ID from the URL parameter
$lastInsertId = isset($_GET['id']) ? $_GET['id'] : 0;

if (isset($_POST['new'])) {
  // Sanitize and validate input
  $lastName = htmlspecialchars($_POST['lastName']);
  $firstName = htmlspecialchars($_POST['firstName']);
  $middleInitial = htmlspecialchars($_POST['middleInitial']);
  $dob = htmlspecialchars($_POST['dob']);
  $sex = htmlspecialchars($_POST['sex']);
  $status = htmlspecialchars($_POST['status']);
  $tin = htmlspecialchars($_POST['tin']);
  $nationality = htmlspecialchars($_POST['nationality']);
  $religion = htmlspecialchars($_POST['religion']);

  // Place Of Birth
  $pob_unit_bldg = htmlspecialchars($_POST['ub']);
  $pob_house_lot_blk = htmlspecialchars($_POST['hlb']);
  $pob_street_name = htmlspecialchars($_POST['sn']);
  $pob_subdivision = htmlspecialchars($_POST['sd']);
  $pob_barangay = htmlspecialchars($_POST['dbl']);
  $pob_city_municipality = htmlspecialchars($_POST['cm']);
  $pob_province = htmlspecialchars($_POST['pv']);
  $pob_country = htmlspecialchars($_POST['ct']);
  $pob_zipcode = htmlspecialchars($_POST['zc']);

  // Home Address
  $home_unit_bldg = htmlspecialchars($_POST['unit_bldg']);
  $home_house_lot_blk = htmlspecialchars($_POST['house_lot_blk']);
  $home_street_name = htmlspecialchars($_POST['street_name']);
  $home_subdivision = htmlspecialchars($_POST['subdivision']);
  $home_barangay = htmlspecialchars($_POST['city']);
  $home_city_municipality = htmlspecialchars($_POST['municipality']);
  $home_province = htmlspecialchars($_POST['province']);
  $home_country = htmlspecialchars($_POST['country']);
  $home_zipcode = htmlspecialchars($_POST['zipcode']);

  // Contact Info
  $cell = htmlspecialchars($_POST['cell']);
  $email = htmlspecialchars($_POST['email']);
  $tel = htmlspecialchars($_POST['tel']);

  // Parents Information
  $father_lname = htmlspecialchars($_POST['lname']);
  $father_fname = htmlspecialchars($_POST['fname']);
  $father_mi = htmlspecialchars($_POST['mi']);
  $mother_lname = htmlspecialchars($_POST['ln']);
  $mother_fname = htmlspecialchars($_POST['fn']);
  $mother_mi = htmlspecialchars($_POST['mid']);

 
  $dobValidation = validateDOB($dob);
  if (is_string($dobValidation)) {
      die($dobValidation);
  }
  $age = $dobValidation;

  
  $sql = "INSERT INTO personal_information (
              last_name, first_name, middle_initial, date_of_birth, age, sex, civil_status, tin, nationality, religion, 
              pob_unit_bldg, pob_house_lot_blk, pob_street_name, pob_subdivision, pob_barangay, pob_city_municipality, pob_province, pob_country, pob_zipcode,
              home_unit_bldg, home_house_lot_blk, home_street_name, home_subdivision, home_barangay, home_city_municipality, home_province, home_country, home_zipcode,
              cell, email, tel,
              father_lname, father_fname, father_mi, mother_lname, mother_fname, mother_mi
          ) VALUES (
              :last_name, :first_name, :middle_initial, :dob, :age, :sex, :status, :tin, :nationality, :religion, 
              :pob_unit_bldg, :pob_house_lot_blk, :pob_street_name, :pob_subdivision, :pob_barangay, :pob_city_municipality, :pob_province, :pob_country, :pob_zipcode,
              :home_unit_bldg, :home_house_lot_blk, :home_street_name, :home_subdivision, :home_barangay, :home_city_municipality, :home_province, :home_country, :home_zipcode,
              :cell, :email, :tel,
              :father_lname, :father_fname, :father_mi, :mother_lname, :mother_fname, :mother_mi
          )";

  $stmt = $dbh->prepare($sql);
  $stmt->execute([
      ':last_name' => $lastName,
      ':first_name' => $firstName,
      ':middle_initial' => $middleInitial,
      ':dob' => $dob,
      ':age' => $age,
      ':sex' => $sex,
      ':status' => $status,
      ':tin' => $tin,
      ':nationality' => $nationality,
      ':religion' => $religion,
      ':pob_unit_bldg' => $pob_unit_bldg,
      ':pob_house_lot_blk' => $pob_house_lot_blk,
      ':pob_street_name' => $pob_street_name,
      ':pob_subdivision' => $pob_subdivision,
      ':pob_barangay' => $pob_barangay,
      ':pob_city_municipality' => $pob_city_municipality,
      ':pob_province' => $pob_province,
      ':pob_country' => $pob_country,
      ':pob_zipcode' => $pob_zipcode,
      ':home_unit_bldg' => $home_unit_bldg,
      ':home_house_lot_blk' => $home_house_lot_blk,
      ':home_street_name' => $home_street_name,
      ':home_subdivision' => $home_subdivision,
      ':home_barangay' => $home_barangay,
      ':home_city_municipality' => $home_city_municipality,
      ':home_province' => $home_province,
      ':home_country' => $home_country,
      ':home_zipcode' => $home_zipcode,
      ':cell' => $cell,
      ':email' => $email,
      ':tel' => $tel,
      ':father_lname' => $father_lname,
      ':father_fname' => $father_fname,
      ':father_mi' => $father_mi,
      ':mother_lname' => $mother_lname,
      ':mother_fname' => $mother_fname,
      ':mother_mi' => $mother_mi
  ]);
  $lastInsertId = $dbh->lastInsertId();
  echo "Data inserted successfully!";
}

if(isset($_POST['update'])){
  // Sanitize and validate input
  $lastName = htmlspecialchars($_POST['lastName']);
  $firstName = htmlspecialchars($_POST['firstName']);
  $middleInitial = htmlspecialchars($_POST['middleInitial']);
  $dob = htmlspecialchars($_POST['dob']);
  $sex = htmlspecialchars($_POST['sex']);
  $status = htmlspecialchars($_POST['status']);
  $tin = htmlspecialchars($_POST['tin']);
  $nationality = htmlspecialchars($_POST['nationality']);
  $religion = htmlspecialchars($_POST['religion']);

  // Place Of Birth
  $pob_unit_bldg = htmlspecialchars($_POST['ub']);
  $pob_house_lot_blk = htmlspecialchars($_POST['hlb']);
  $pob_street_name = htmlspecialchars($_POST['sn']);
  $pob_subdivision = htmlspecialchars($_POST['sd']);
  $pob_barangay = htmlspecialchars($_POST['dbl']);
  $pob_city_municipality = htmlspecialchars($_POST['cm']);
  $pob_province = htmlspecialchars($_POST['pv']);
  $pob_country = htmlspecialchars($_POST['ct']);
  $pob_zipcode = htmlspecialchars($_POST['zc']);

  // Home Address
  $home_unit_bldg = htmlspecialchars($_POST['unit_bldg']);
  $home_house_lot_blk = htmlspecialchars($_POST['house_lot_blk']);
  $home_street_name = htmlspecialchars($_POST['street_name']);
  $home_subdivision = htmlspecialchars($_POST['subdivision']);
  $home_barangay = htmlspecialchars($_POST['city']);
  $home_city_municipality = htmlspecialchars($_POST['municipality']);
  $home_province = htmlspecialchars($_POST['province']);
  $home_country = htmlspecialchars($_POST['country']);
  $home_zipcode = htmlspecialchars($_POST['zipcode']);

  // Contact Info
  $cell = htmlspecialchars($_POST['cell']);
  $email = htmlspecialchars($_POST['email']);
  $tel = htmlspecialchars($_POST['tel']);

  // Parents Information
  $father_lname = htmlspecialchars($_POST['lname']);
  $father_fname = htmlspecialchars($_POST['fname']);
  $father_mi = htmlspecialchars($_POST['mi']);
  $mother_lname = htmlspecialchars($_POST['ln']);
  $mother_fname = htmlspecialchars($_POST['fn']);
  $mother_mi = htmlspecialchars($_POST['mid']);

 
  $dobValidation = validateDOB($dob);
  if (is_string($dobValidation)) {
      die($dobValidation);
  }
  $age = $dobValidation;

  
  $sql = "UPDATE personal_information SET
  last_name = :last_name, 
  first_name = :first_name, 
  middle_initial = :middle_initial, 
  date_of_birth = :dob, 
  age = :age, 
  sex = :sex, 
  civil_status = :status, 
  tin = :tin, 
  nationality = :nationality, 
  religion = :religion, 
  pob_unit_bldg = :pob_unit_bldg, 
  pob_house_lot_blk = :pob_house_lot_blk, 
  pob_street_name = :pob_street_name, 
  pob_subdivision = :pob_subdivision, 
  pob_barangay = :pob_barangay, 
  pob_city_municipality = :pob_city_municipality, 
  pob_province = :pob_province, 
  pob_country = :pob_country, 
  pob_zipcode = :pob_zipcode, 
  home_unit_bldg = :home_unit_bldg, 
  home_house_lot_blk = :home_house_lot_blk, 
  home_street_name = :home_street_name, 
  home_subdivision = :home_subdivision, 
  home_barangay = :home_barangay, 
  home_city_municipality = :home_city_municipality, 
  home_province = :home_province, 
  home_country = :home_country, 
  home_zipcode = :home_zipcode, 
  cell = :cell, 
  email = :email, 
  tel = :tel, 
  father_lname = :father_lname, 
  father_fname = :father_fname, 
  father_mi = :father_mi, 
  mother_lname = :mother_lname, 
  mother_fname = :mother_fname, 
  mother_mi = :mother_mi 
WHERE id = :id"; 
$stmt = $dbh->prepare($sql);
$stmt->execute([
':last_name' => $lastName,
':first_name' => $firstName,
':middle_initial' => $middleInitial,
':dob' => $dob,
':age' => $age,
':sex' => $sex,
':status' => $status,
':tin' => $tin,
':nationality' => $nationality,
':religion' => $religion,
':pob_unit_bldg' => $pob_unit_bldg,
':pob_house_lot_blk' => $pob_house_lot_blk,
':pob_street_name' => $pob_street_name,
':pob_subdivision' => $pob_subdivision,
':pob_barangay' => $pob_barangay,
':pob_city_municipality' => $pob_city_municipality,
':pob_province' => $pob_province,
':pob_country' => $pob_country,
':pob_zipcode' => $pob_zipcode,
':home_unit_bldg' => $home_unit_bldg,
':home_house_lot_blk' => $home_house_lot_blk,
':home_street_name' => $home_street_name,
':home_subdivision' => $home_subdivision,
':home_barangay' => $home_barangay,
':home_city_municipality' => $home_city_municipality,
':home_province' => $home_province,
':home_country' => $home_country,
':home_zipcode' => $home_zipcode,
':cell' => $cell,
':email' => $email,
':tel' => $tel,
':father_lname' => $father_lname,
':father_fname' => $father_fname,
':father_mi' => $father_mi,
':mother_lname' => $mother_lname,
':mother_fname' => $mother_fname,
':mother_mi' => $mother_mi,
':id' => $_POST['id'] 
]);
$lastInsertId = $_POST['id'] ;
echo "Data updated successfully!";

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

  <?php 
  if ($lastInsertId > 0) {
    $sql = "SELECT * FROM personal_information WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$lastInsertId]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$row) {
      echo "<div class='text-red-500 text-center p-4'>Record not found. ID: $lastInsertId</div>";
    } else {
      // Assign values from the fetched row
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

      // Place of Birth
      $pob_unit_bldg = $row['pob_unit_bldg'];
      $pob_house_lot_blk = $row['pob_house_lot_blk'];
      $pob_street_name = $row['pob_street_name'];
      $pob_subdivision = $row['pob_subdivision'];
      $pob_barangay = $row['pob_barangay'];
      $pob_city_municipality = $row['pob_city_municipality'];
      $pob_province = $row['pob_province'];
      $pob_country = $row['pob_country'];
      $pob_zipcode = $row['pob_zipcode'];

      // Home Address
      $home_unit_bldg = $row['home_unit_bldg'];
      $home_house_lot_blk = $row['home_house_lot_blk'];
      $home_street_name = $row['home_street_name'];
      $home_subdivision = $row['home_subdivision'];
      $home_barangay = $row['home_barangay'];
      $home_city_municipality = $row['home_city_municipality'];
      $home_province = $row['home_province'];
      $home_country = $row['home_country'];
      $home_zipcode = $row['home_zipcode'];

      // Contact Info
      $cell = $row['cell'];
      $email = $row['email'];
      $tel = $row['tel'];

      // Parents Information
      $father_lname = $row['father_lname'];
      $father_fname = $row['father_fname'];
      $father_mi = $row['father_mi'];
      $mother_lname = $row['mother_lname'];
      $mother_fname = $row['mother_fname'];
      $mother_mi = $row['mother_mi'];
      ?>

      <table class="table-auto w-full mt-6 border-collapse border border-gray-400">
        <thead>
          <tr class="bg-gray-200">
            <th class="border border-gray-400 px-4 py-2">Field</th>
            <th class="border border-gray-400 px-4 py-2">Value</th>
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

          <tr class="bg-gray-200"><th class="border border-gray-400 py-2" colspan="2">Place of Birth</th></tr>
          <tr><td class="border px-4 py-2">Unit/Bldg</td><td class="border px-4 py-2"><?php echo $pob_unit_bldg; ?></td></tr>
          <tr><td class="border px-4 py-2">House/Lot & Blk</td><td class="border px-4 py-2"><?php echo $pob_house_lot_blk; ?></td></tr>
          <tr><td class="border px-4 py-2">Street Name</td><td class="border px-4 py-2"><?php echo $pob_street_name; ?></td></tr>
          <tr><td class="border px-4 py-2">Subdivision</td><td class="border px-4 py-2"><?php echo $pob_subdivision; ?></td></tr>
          <tr><td class="border px-4 py-2">Barangay</td><td class="border px-4 py-2"><?php echo $pob_barangay; ?></td></tr>
          <tr><td class="border px-4 py-2">City/Municipality</td><td class="border px-4 py-2"><?php echo $pob_city_municipality; ?></td></tr>
          <tr><td class="border px-4 py-2">Province</td><td class="border px-4 py-2"><?php echo $pob_province; ?></td></tr>
          <tr><td class="border px-4 py-2">Country</td><td class="border px-4 py-2"><?php echo $pob_country; ?></td></tr>
          <tr><td class="border px-4 py-2">Zip Code</td><td class="border px-4 py-2"><?php echo $pob_zipcode; ?></td></tr>

          <tr class="bg-gray-200"><th class="border border-gray-400 py-2" colspan="2">Home Address</th></tr>
          <tr><td class="border px-4 py-2">Unit/Bldg</td><td class="border px-4 py-2"><?php echo $home_unit_bldg; ?></td></tr>
          <tr><td class="border px-4 py-2">House/Lot & Blk</td><td class="border px-4 py-2"><?php echo $home_house_lot_blk; ?></td></tr>
          <tr><td class="border px-4 py-2">Street Name</td><td class="border px-4 py-2"><?php echo $home_street_name; ?></td></tr>
          <tr><td class="border px-4 py-2">Subdivision</td><td class="border px-4 py-2"><?php echo $home_subdivision; ?></td></tr>
          <tr><td class="border px-4 py-2">Country</td><td class="border px-4 py-2"><?php echo $home_country; ?></td></tr>
          <tr><td class="border px-4 py-2">Province</td><td class="border px-4 py-2"><?php echo $home_province; ?></td></tr>
          <tr><td class="border px-4 py-2">City/Municipality</td><td class="border px-4 py-2"><?php echo $home_city_municipality; ?></td></tr>
          <tr><td class="border px-4 py-2">Barangay</td><td class="border px-4 py-2"><?php echo $home_barangay; ?></td></tr>
          <tr><td class="border px-4 py-2">Zip Code</td><td class="border px-4 py-2"><?php echo $home_zipcode; ?></td></tr>

          <tr class="bg-gray-200"><th class="border border-gray-400 py-2" colspan="2">Contact Information</th></tr>
          <tr><td class="border px-4 py-2">Cellphone</td><td class="border px-4 py-2"><?php echo $cell; ?></td></tr>
          <tr><td class="border px-4 py-2">Email</td><td class="border px-4 py-2"><?php echo $email; ?></td></tr>
          <tr><td class="border px-4 py-2">Telephone</td><td class="border px-4 py-2"><?php echo $tel; ?></td></tr>

          <tr class="bg-gray-200"><th class="border border-gray-400 py-2" colspan="2">Parents</th></tr>
          <tr><td class="border px-4 py-2">Father</td><td class="border px-4 py-2"><?php echo "$father_lname, $father_fname $father_mi."; ?></td></tr>
          <tr><td class="border px-4 py-2">Mother</td><td class="border px-4 py-2"><?php echo "$mother_lname, $mother_fname $mother_mi."; ?></td></tr>
        </tbody>
      </table>
      <?php
    }
  } else {
    echo "<div class='text-red-500 text-center p-4'>No record ID provided. Please submit the form first.</div>";
  }
  ?>
   
  </div>
</body>
</html>