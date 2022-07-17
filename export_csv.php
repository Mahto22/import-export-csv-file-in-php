                        <?php 
                        // connect database file
                        require_once('db_conn.php');
                         
                        // Fetch records from database 
                        $query = $conn->query("SELECT * FROM users_data ORDER BY id ASC"); 
                         
                        if($query->num_rows > 0){ 
                            $delimiter = ","; 
                            $filename = "export_user_data " . date('Y-m-d') . ".csv"; 
                             
                            // Create a file pointer 
                            $f = fopen('php://memory', 'w'); 
                             
                            // Set column headers 
                            $fields = array('ID', 'FIRST NAME','EMAIL','Contact','STATUS'); 
                            fputcsv($f, $fields, $delimiter); 
                             
                            // Output each row of the data, format line as csv and write to file pointer 
                            while($row = $query->fetch_assoc()){ 
                                $status = ($row['status'] == 1)?'active':'inactive'; 
                                $lineData = array($row['id'], $row['first_name'],$row['email'], $row['contact_no'],$status); 
                                fputcsv($f, $lineData, $delimiter); 
                            } 
                             
                            // Move back to beginning of file 
                            fseek($f, 0); 
                             
                            // Set headers to download file rather than displayed 
                            header('Content-Type: text/csv'); 
                            header('Content-Disposition: attachment; filename="' . $filename . '";'); 
                             
                            //output all remaining data on a file pointer 
                            fpassthru($f); 
                        } 
                        exit; 
                         
                        ?>