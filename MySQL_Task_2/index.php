<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MySQL Task 2</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
<?php
 
 //Include the connection script
 Include ("dbconnect.php");
 
//  Storing the query into a variable
 $table1 = $connect->query("select *
 from employee_code_table;");
 
 $table2 = $connect->query("select *
 from employee_salary_table;");
 
 $table3 = $connect->query("select *
 from employee_details_table;");
 
 $query1 = $connect->query("select employee_details_table.employee_first_name,employee_salary_table.employee_salary
 from employee_salary_table
 join employee_details_table on employee_salary_table.employee_id=employee_details_table.employee_id
 where employee_salary_table.employee_salary > 50000;");
 
 $query2= $connect->query("select employee_last_name,graduation_percentile
 from employee_details_table
 where graduation_percentile > 70;");
 
 $query3 = $connect->query(" select employee_code_table.employee_code_name,employee_details_table.graduation_percentile
 from employee_details_table
 join employee_salary_table on employee_details_table.employee_id=employee_salary_table.employee_id
 join employee_code_table on employee_salary_table.employee_code=employee_code_table.employee_code
 where employee_details_table.graduation_percentile < 70;");
 
 $query4 = $connect->query(" select concat(employee_first_name,' ',employee_last_name),employee_code_table.employee_domain
 from employee_code_table
 join employee_salary_table on employee_code_table.employee_code=employee_salary_table.employee_code
 join employee_details_table on employee_salary_table.employee_id=employee_details_table.employee_id
 where employee_code_table.employee_domain != 'Java';");
  
 $query5 = $connect->query(" select distinct employee_code_table.employee_domain,sum(employee_salary_table.employee_salary) as domain_salary
 from employee_salary_table
 join employee_code_table on employee_salary_table.employee_code=employee_code_table.employee_code
 group by employee_code_table.employee_domain;");
 
 $query6 = $connect->query(" select distinct employee_code_table.employee_domain,sum(employee_salary_table.employee_salary)
 from employee_salary_table
 join employee_code_table on employee_salary_table.employee_code=employee_code_table.employee_code
 where employee_salary_table.employee_salary > 30000
 group by employee_code_table.employee_domain;");
 
 $query7 = $connect->query(" select employee_salary_table.employee_id
 from employee_salary_table
 where employee_salary_table.employee_code = NULL;");
 

//  Fetching query $table1 and displaying the data into table.
 if ($table1->num_rows > 0) {
     echo "<br>";
     echo "<br>";
     ?>
     <br/>
     <table>
         <tr>Employee_code_table</tr>
         <tr>
         <th>Employee_code</th>
         <th>Employee_code_name</th>
         <th>Employee_domain</th>
         </tr>
       
 
                 <?php
                  // Read the records
                  while($row = $table1->fetch_assoc()) { 
                  ?>
    
         <tr>
            <!-- Reading the data -->
             <td> <?php echo $row["employee_code"]; ?> </td>
             <td> <?php echo $row["employee_code_name"]; ?> </td>
             <td> <?php echo $row["employee_domain"]; ?></td>
             </tr> 
         <?php
     }?>
     </table>
     <?php
 }
 
 else{
     echo "<br/> No record found";
 }
 echo "<br>";

//  Fetching query $table2 and displaying data into table.
 if ($table2->num_rows > 0) {
     ?>
     <br/>
    
     <table>
         <tr>Employee_salary_table</tr>
         <tr>
         <th>Employee_id</th>
         <th>Employee_salary</th>
         <th>Employee_code</th>
         </tr>
     <?php
     // Read the records
     while($row = $table2->fetch_assoc()) {
         ?>
         <!-- Reading the data -->
         <tr>
             <td> <?php echo $row["employee_id"]; ?> </td>
             <td> <?php echo $row["employee_salary"]; ?> </td>
             <td> <?php echo $row["employee_code"]; ?></td>
             </tr> 
         <?php
     }?>
     </table>
     <?php
 }
 else{
     echo "<br/> No record found";
 }
 echo "<br>";

 //  Fetching query $table3 and displaying data into table.
 if ($table3->num_rows > 0) {
     ?>
     <br/>

     <table>
         <tr>Employee_details_table</tr>
         <tr>
         <th>Employee_id</th>
         <th>Employee_first_name</th>
         <th>Employee_last_name</th>
         <th>Graduation_percentile</th>
         </tr>
     <?php
     // Read the records
     while($row = $table3->fetch_assoc()) {
         ?>
         <!-- Reading the data -->
         <tr>
             <td> <?php echo $row["employee_id"]; ?> </td>
             <td> <?php echo $row["employee_first_name"]; ?> </td>
             <td> <?php echo $row["employee_last_name"]; ?></td>
             <td> <?php echo $row["graduation_percentile"]; ?></td>
             </tr> 
         <?php
     }?>
     </table>
     <?php
 }
 else{
     echo "<br/> No record found";
 }
 echo "<br>";

 //  Fetching query $query1 and displaying data into table.
 if ($query1->num_rows > 0) {
     ?>
     <br/>

     <table>
         <tr>Query1</tr>
         <tr>
         <th>Employee_first_name</th>
         <th>Employee_salary</th>
         </tr>
     <?php
     // Read the records
     while($row = $query1->fetch_assoc()) {
         ?>
         <!-- Read the data -->
         <tr>
             <td> <?php echo $row["employee_first_name"]; ?> </td>
             <td> <?php echo $row["employee_salary"]; ?></td>
             </tr> 
         <?php
     }?>
     </table>
     <?php
 }
 else{
     echo "<br/> No record found";
 }
 echo "<br>";

 //  Fetching query $query2 and displaying data into table.
 if ($query2->num_rows > 0) {
     ?>
     <br/>

     <table>
         <tr>Query2</tr>
         <tr>
         <th>Employee_last_name</th>
         <th>Graduation_percentile</th>
         </tr>
     <?php
     // Read the records
     while($row = $query2->fetch_assoc()) {
         ?>
         <!-- Read the data -->
         <tr>
             <td> <?php echo $row["employee_last_name"]; ?> </td>
             <td> <?php echo $row["graduation_percentile"]; ?></td>
             </tr> 
         <?php
     }?>
     </table>
     <?php
 }
 else{
     echo "<br/> No record found";
 }
 echo "<br>";

 //  Fetching query $query3 and displaying data into table.
 if ($query3->num_rows > 0) {
     ?>
     <br/>

     <table>
         <tr>Query3</tr>
         <tr>
         <th>Employee_code_name</th>
         <th>Graduation_percentile</th>
         </tr>
     <?php
     // Read the records
     while($row = $query3->fetch_assoc()) {
         ?>
         <!-- Read the data -->
         <tr>
             <td> <?php echo $row["employee_code_name"]; ?> </td>
             <td> <?php echo $row["graduation_percentile"]; ?></td>
             </tr> 
         <?php
     }?>
     </table>
     <?php
 }
 else{
     echo "<br/> No record found";
 }
 echo "<br>";

 //  Fetching query $query4 and displaying data into table.
 if ($query4->num_rows > 0) {
     ?>
     <br/>

     <table>
         <tr>Query4</tr>
         <tr>
         <th>Employee_full_name</th>
         <th>Employee_domain</th>
         </tr>
     <?php
     // Read the records
     while($row = $query4->fetch_assoc()) {
         ?>
         <!-- Read the data -->
         <tr>
             <td> <?php echo $row["concat(employee_first_name,' ',employee_last_name)"]; ?> </td>
             <td> <?php echo $row["employee_domain"]; ?></td>
             </tr> 
         <?php
     }?>
     </table>
     <?php
 }
 else{
     echo "<br/> No record found";
 }
 echo "<br>";

 //  Fetching query $query5 and displaying data into table.
 if ($query5->num_rows > 0) {
     ?>
     <br/>
 
     <table>
         <tr>Query5</tr>
         <tr>
         <th>Employee_domain</th>
         <th>Domain_salary</th>
         </tr>
     <?php
     // Read the records
     while($row = $query5->fetch_assoc()) {
         ?>
         <!-- Read the data -->
         <tr>
             <td> <?php echo $row["employee_domain"]; ?> </td>
             <td> <?php echo $row["domain_salary"]; ?></td>
             </tr> 
         <?php
     }?>
     </table>
     <?php
 }
 else{
     echo "<br/> No record found";
 }
 echo "<br>";

 //  Fetching query $query6 and displaying data into table.
 if ($query6->num_rows > 0) {
     ?>
     <br/>

     <table>
         <tr>Query6</tr>
         <tr>
         <th>Employee_domain</th>
         <th>Domain_salary</th>
         </tr>
     <?php
     // Read the records
     while($row = $query6->fetch_assoc()) {
         ?>
         <!-- Read the data -->
         <tr>
             <td> <?php echo $row["employee_domain"]; ?> </td>
             <td> <?php echo $row["sum(employee_salary_table.employee_salary)"]; ?></td>
             </tr> 
         <?php
     }?>
     </table>
     <?php
 }
 else{
     echo "<br/> No record found";
 }
 echo "<br>";

 //  Fetching query $query7 and displaying data into table.
 if ($query7->num_rows > 0) {
     ?>
 
     <table>
         <tr>Query7</tr>
         <tr>
         <th>Employee_id</th>
         </tr>
     <?php
     // Read the records
     while($row = $query7->fetch_assoc()) {
         ?>
         <!-- Read the data -->
         <tr>
             <td> <?php echo $row["employee_id"]; ?> </td>
             </tr> 
         <?php
     }?>
     </table>
     <?php
 }
 else{
     echo "<br/> No record found";
 }
 echo "<br>";
 
//  Closing the server
 $conn->close();
  
 ?>
</body>
</html>