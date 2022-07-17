                    <?php
                    // connect database file
                    require_once('db_conn.php');

                    if(isset($_POST['importSubmit'])){
                        
                        // Allowed mime types
                        $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
                        
                        // Validate whether selected file is a CSV file
                        if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
                            
                            // If the file is uploaded
                            if(is_uploaded_file($_FILES['file']['tmp_name'])){
                                
                                // Open uploaded CSV file with read-only mode
                                $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
                                //print_r($csvFile);exit();
                                
                                // Skip the first line
                                fgetcsv($csvFile); // id
                                //print_r(fgetcsv($csvFile));exit();
                                
                                // Parse data from CSV file line by line
                                while(($line = fgetcsv($csvFile ,1000, ",")) != FALSE){
                                    // Get row data
                                    $first_name  = $line[0];
                                    $email  = $line[1];
                                    $contact_no  = $line[2];
                                    $status  = $line[3];
                                    //exit();
                                    // Check whether member already exists in the database with the same email
                                    $prevQuery = "SELECT id FROM users_data WHERE email = '".$line[1]."'";
                                    $prevResult = $conn->query($prevQuery);
                                    
                                    if($prevResult->num_rows > 0){
                                        // Update member data in the database
                                        $conn->query("UPDATE users_data SET first_name = '".$first_name."', contact_no = '".$contact_no."',status = '".$status."' WHERE email = '".$email."'");
                                    }else{
                                        
                                            $sql = "INSERT INTO users_data (first_name, email, contact_no,status)
                                                VALUES ('$first_name', '$email','$contact_no','$status');";
                                            $result = $conn->query($sql); 
                                            //print_r($result);exit();
                                        
                                            if(stristr($email, '@gmail.com') !== false){
                                                $sql = "INSERT INTO gmail_tbl (gmail_email) VALUES ('$email')";
                                                $conn->query($sql);
                                            }elseif(stristr($email, '@yahoo.com')!== false){
                                            $sql = "INSERT INTO yahoo_tbl (yahoo_email)
                                            VALUES ('$email')";
                                            $conn->query($sql);
                                        }else{
                                            $sql = "INSERT INTO other_tbl (other_email)
                                            VALUES ('$email')";
                                            $conn->query($sql);
                                        }
                        
                                    }
                                }
                                
                                // Close opened CSV file
                                fclose($csvFile);
                                
                                $qstring = '?status=succ';
                            }else{
                                $qstring = '?status=err';
                            }
                        }else{
                            $qstring = '?status=invalid_file';
                        }
                    }

                    // Redirect to the listing page
                    header("Location: index.php".$qstring);