<?php
session_start();
if (!isset($_SESSION['username'])) {
	header('location:../index.php');
}
require '../config/config.php';
require '../lib/database.php';
$db = new Database();

$project_name_id = $_SESSION['project_name_id'];
$fromdate = $_POST['fromdate'];
$todate	  = $_POST['todate'];



if ($fromdate == '') {
	echo "<tr><th>Please Select from date.</th></tr>";
} else if ($todate == '') {
	echo "<tr><th>Please Select todate.</th></tr>";
} else {
	$sql = "SELECT * FROM customers_pathor WHERE project_name_id = '$project_name_id'";
	$result = $db->select($sql);
	$row_number = mysqli_num_rows($result);
	if ($result && $row_number > 0) {
		// echo $row_number;
		$i = 1;
		echo "<tr>";
					    // echo "<th style='border: 1px solid #777 !important;'>".$i."</th>";
						echo "<th style='border: 1px solid #777 !important;'>#</th>";
						echo "<th style='border: 1px solid #777 !important;'>কাস্টমার আই.ডি</th>";
						echo "<th style='border: 1px solid #777 !important;'>কাস্টমার নাম</th>";
						echo "<th style='border: 1px solid #777 !important;'>মোট গাড়ী ভাড়াঃ</td>";
						echo "<th style='border: 1px solid #777 !important;'>মোট খালাস খরচঃ</td>";

						echo "<th style='border: 1px solid #777 !important;'>মোট মূলঃ</th>";
						echo "<th style='border: 1px solid #777 !important;'>মোট জমাঃ</th>";
						echo "<th style='border: 1px solid #777 !important;'>মো‌ট জেরঃ</th>";
						echo "<th style='border: 1px solid #777 !important;'>নিজ পাওনাঃ</th>";
						 echo "</tr>"; 



		
		while ($row = $result->fetch_assoc()) {
			$customer_id = $row['customer_id'];
			// echo "<tr>";
			// echo "<td colspan='5' style='border: 1px solid #777 !important; text-align: center; font-size: 28px; background-color: #ddd;'>" . $row['dealer_name'] . "</td>";
			// echo "</tr>";

			// echo "<tr>";
			// echo "<th style='border: 1px solid #777 !important;'>" . $i . "</th>";
			// echo "<th style='border: 1px solid #777 !important;'>ডিলার আই.ডি</th>";
			// echo "<th style='border: 1px solid #777 !important;'>ঠিকানা</th>";
			// echo "<th style='border: 1px solid #777 !important;'>যোগাযোগ ব্যাক্তির নাম</th>";
			// echo "<th style='border: 1px solid #777 !important;'>মোবাইল</th>";
			// echo "</tr>";


			// echo "<tr>";
			// echo "<td style='border: 1px solid #777 !important;'></td>";
			// echo "<td style='border: 1px solid #777 !important;'>" . $customer_id . "</td>";
			// echo "<td style='border: 1px solid #777 !important;'>" . $row['address'] . "</td>";
			// echo "<td style='border: 1px solid #777 !important;'>" . $row['contact_person_name'] . "</td>";
			// echo "<td style='border: 1px solid #777 !important;'>" . $row['mobile'] . "</td>";
			// echo "</tr>";



			// 	// Details Showing Code Here
			// 	$rod500w = 0;
			// 	$rod400w = 0;

			// 	$sql2 = "SELECT SUM(kg) as kg FROM details WHERE particulars LIKE '%500W%' AND customer_id = '$customer_id' AND project_name_id = '$project_name_id'";
			//     $result2 = $db->select($sql2);
			//     if($result2->num_rows > 0){
			//         while($row2 = $result2->fetch_assoc()){
			//             $rod500w = $row2['kg'];
			//             if(is_null($rod500w)){
			//                 $rod500w = 0;
			//             }
			//         }
			//     } else{
			//         $rod500w = 0;
			//     }
			//     $sql2 = "SELECT SUM(kg) as kg FROM details WHERE particulars LIKE '%400W%' AND customer_id = '$customer_id' AND project_name_id = '$project_name_id'";
			//     $result2 = $db->select($sql2);
			//     if($result2->num_rows > 0){
			//         while($row2 = $result2->fetch_assoc()){
			//             $rod400w = $row2['kg'];
			//             if(is_null($rod400w)){
			//                 $rod400w = 0;
			//             }
			//         }
			//     } else{
			//         $rod400w = 0;
			//     }
			//     $rod_total_500w_400W = $rod400w + $rod500w;

			//     // Start total total_motor
			//     	$total_motor = 0;
			//         $sql2 = "SELECT SUM(motor) as motor FROM details WHERE customer_id = '$customer_id' AND project_name_id = '$project_name_id'";
			//         $result2 = $db->select($sql2);
			//         if($result2->num_rows > 0){
			//             while($row2 = $result2->fetch_assoc()){
			//                 $total_motor = $row2['motor'];
			//                 if(is_null($total_motor)){
			//                     $total_motor = 0;
			//                 }
			//             }
			//         } else{
			//             $total_motor = 0;
			//         }
			//     // End total total_motor
			//     //Start Gari vara
			//     	$motor_cash = 0;
			//         $sql2 = "SELECT SUM(motor_cash) as motor_cash FROM details WHERE customer_id = '$customer_id' AND project_name_id = '$project_name_id'";
			//         $result2 = $db->select($sql2);
			//         if($result2->num_rows > 0){
			//             while($row2 = $result2->fetch_assoc()){
			//                 $motor_cash = $row2['motor_cash'];
			//                 if(is_null($motor_cash)){
			//                     $motor_cash = 0;
			//                 }
			//             }
			//         } else{
			//             $motor_cash = 0;
			//         }
			//     //End Gari vara

			//     //Start khalas/Unload
			//         $unload = 0;
			//         $sql2 = "SELECT SUM(unload) as unload FROM details WHERE customer_id = '$customer_id' AND project_name_id = '$project_name_id'";
			//         $result2 = $db->select($sql2);
			//         if($result2->num_rows > 0){
			//             while($row2 = $result2->fetch_assoc()){
			//                 $unload = $row2['unload'];
			//                 if(is_null($unload)){
			//                     $unload = 0;
			//                 }
			//             }
			//         } else{
			//             $unload = 0;
			//         }
			//         $motor_cash_and_unload = $motor_cash + $unload;
			//     //End khalas/Unload
			//     // Start total total_credit/mot_mul
			//         $total_credit = 0;
			//         $sql2 = "SELECT SUM(credit) as credit FROM details WHERE customer_id = '$customer_id' AND project_name_id = '$project_name_id'";
			//         $result2 = $db->select($sql2);
			//         if($result2->num_rows > 0){
			//             while($row2 = $result2->fetch_assoc()){
			//                 $total_credit = $row2['credit'];
			//                 if(is_null($total_credit)){
			//                     $total_credit = 0;
			//                 }
			//             }
			//         } else{
			//             $total_credit = 0;
			//         }
			//     // End total total_credit/mot_mul

			//     // Start total total_debit/joma
			//         $total_debit = 0;
			//         $sql2 = "SELECT SUM(debit) as debit FROM details WHERE customer_id = '$customer_id' AND project_name_id = '$project_name_id'";
			//         $result2 = $db->select($sql2);
			//         if($result2->num_rows > 0){
			//             while($row2 = $result2->fetch_assoc()){
			//                 $total_debit = $row2['debit'];
			//                 if(is_null($total_debit)){
			//                     $total_debit = 0;
			//                 }
			//             }
			//         } else{
			//             $total_debit = 0;
			//         }
			//     // End total total_debit/joma

			//     // Start total total_Balance/mot_jer
			//         $total_balance = 0;
			//         $sql2 = "SELECT SUM(balance) as balance FROM details WHERE customer_id = '$customer_id' AND project_name_id = '$project_name_id'";
			//         $result2 = $db->select($sql2);
			//         if($result2->num_rows > 0){
			//             while($row2 = $result2->fetch_assoc()){
			//                 $total_balance = $row2['balance'];
			//                 if(is_null($total_balance)){
			//                     $total_balance = 0;
			//                 }
			//             }
			//         } else{
			//             $total_balance = 0;
			//         }
			//     // End total total_Balance/mot_jer
			//     //Start GB Bank Ganti
			//         $gb_bank_ganti = 0;
			//         $sql2 = "SELECT SUM(debit) as debit, id FROM details WHERE particulars = 'BG' AND customer_id = '$customer_id' AND project_name_id = '$project_name_id'";
			//         $result2 = $db->select($sql2);
			//         if($result2->num_rows > 0){
			//             while($row2 = $result2->fetch_assoc()){
			//                 $gb_bank_ganti = $row2['debit'];
			//                 $gb_bank_ganti_db_id = $row2['id'];
			//                 if(is_null($gb_bank_ganti)){
			//                     $gb_bank_ganti = 0;
			//                 }
			//             }
			//         } else{
			//             $gb_bank_ganti = 0;
			//         }

			//     //End GB Bank Ganti
			// //Start Total para/mot_mul_khoros_shoho
			//         $total_paras = 0;
			//         $sql2 = "SELECT SUM(total_paras) as total_paras FROM details WHERE customer_id = '$customer_id' AND project_name_id = '$project_name_id'";
			//         $result2 = $db->select($sql2);
			//         if($result2->num_rows > 0){
			//             while($row2 = $result2->fetch_assoc()){
			//                 $total_paras = $row2['total_paras'];
			//                 if(is_null($total_paras)){
			//                     $total_paras = 0;
			//                 }
			//             }
			//         } else{
			//             $total_paras = 0;
			//         }
			//End Total para/mot_mul_khoros_shoho







			//Start Gari vara
			$motor_vara = 0;
			$sql2 = "SELECT SUM(motor_vara) as motor_vara FROM details_sell_pathor WHERE customer_id = '$customer_id' AND project_name_id = '$project_name_id'";
			$result3 = $db->select($sql2);
			if($result3->num_rows > 0){
				while($row3 = $result3->fetch_assoc()){
					$motor_vara = $row3['motor_vara'];
					if(is_null($motor_vara)){
						$motor_vara = 0;
					}
				}
			} else{
				$motor_vara = 0;
			}


			$total_motor_vara = 0;
						        $sql3 = "SELECT SUM(motor_vara) as motor_vara FROM details_sell_pathor WHERE project_name_id = '$project_name_id'";
						        $result3 = $db->select($sql3);
						        if($result3->num_rows > 0){
						            while($row3 = $result3->fetch_assoc()){
						                $total_motor_vara = $row3['motor_vara'];
						                if(is_null($total_motor_vara)){
						                    $total_motor_vara = 0;
						                }
						            }
						        } else{
						            $total_motor_vara = 0;
						        }

			
		    //End Gari vara

		    //Start khalas/Unload
		        $unload = 0;
		        $sql2 = "SELECT SUM(unload) as unload FROM details_sell_pathor WHERE customer_id = '$customer_id' AND project_name_id = '$project_name_id'";
		        $result2 = $db->select($sql2);
		        if($result2->num_rows > 0){
		            while($row2 = $result2->fetch_assoc()){
		                $unload = $row2['unload'];
		                if(is_null($unload)){
		                    $unload = 0;
		                }
		            }
		        } else{
		            $unload = 0;
		        }
		        $motor_vara_and_unload = $motor_vara + $unload;

				$total_unload = 0;
								$sql3 = "SELECT SUM(unload) as unload FROM details_sell_pathor WHERE  project_name_id = '$project_name_id'";
								$result3 = $db->select($sql3);
								if($result3->num_rows > 0){
									while($row3 = $result3->fetch_assoc()){
										$total_unload = $row3['unload'];
									   if(is_null($total_unload)){
										  $total_unload = 0;
									  }
								   }
								} else{
								   $total_unload = 0;
								}
		    //End khalas/Unload
		    // Start total total_credit/mot_mul
		        $total_credit = 0;
		        $sql2 = "SELECT SUM(credit) as credit FROM details_sell_pathor WHERE customer_id = '$customer_id' AND project_name_id = '$project_name_id'";
		        $result2 = $db->select($sql2);
		        if($result2->num_rows > 0){
		            while($row2 = $result2->fetch_assoc()){
		                $total_credit = $row2['credit'];
		                if(is_null($total_credit)){
		                    $total_credit = 0;
		                }
		            }
		        } else{
		            $total_credit = 0;
		        }

				$total1_credit = 0;
						        $sql3 = "SELECT SUM(credit) as credit FROM details_sell_pathor WHERE project_name_id = '$project_name_id'";
						        $result3 = $db->select($sql3);
						        if($result3->num_rows > 0){
						            while($row3 = $result3->fetch_assoc()){
						                $total1_credit = $row3['credit'];
						                if(is_null($total1_credit)){
						                    $total1_credit = 0;
						                }
						            }
						        } else{
						            $total1_credit = 0;
						        }
		    // End total total_credit/mot_mul

		    // Start total total_debit/joma
		        $total_debit = 0;
		        $sql2 = "SELECT SUM(debit) as debit FROM details_sell_pathor WHERE customer_id = '$customer_id' AND project_name_id = '$project_name_id'";
		        $result2 = $db->select($sql2);
		        if($result2->num_rows > 0){
		            while($row2 = $result2->fetch_assoc()){
		                $total_debit = $row2['debit'];
		                if(is_null($total_debit)){
		                    $total_debit = 0;
		                }
		            }
		        } else{
		            $total_debit = 0;
		        }

				$total1_debit = 0;
						        $sql3 = "SELECT SUM(debit) as debit FROM details_sell_pathor WHERE project_name_id = '$project_name_id'";
						        $result3 = $db->select($sql3);
						        if($result3->num_rows > 0){
						            while($row3 = $result3->fetch_assoc()){
						                $total1_debit = $row3['debit'];
						                if(is_null($total1_debit)){
						                    $total1_debit = 0;
						                }
						            }
						        } else{
						            $total1_debit = 0;
						        }
		    // End total total_debit/joma

		    // Start total total_Balance/mot_jer
		        $total_balance = 0;
		        $sql2 = "SELECT SUM(balance) as balance FROM details_sell_pathor WHERE customer_id = '$customer_id' AND project_name_id = '$project_name_id'";
		        $result2 = $db->select($sql2);
		        if($result2->num_rows > 0){
		            while($row2 = $result2->fetch_assoc()){
		                $total_balance = $row2['balance'];
		                if(is_null($total_balance)){
		                    $total_balance = 0;
		                }
		            }
		        } else{
		            $total_balance = 0;
		        }

				$total1_balance = 0;
				$sql3 = "SELECT SUM(balance) as balance FROM details_sell_pathor WHERE  project_name_id = '$project_name_id'";
				$result3 = $db->select($sql3);
				if($result3->num_rows > 0){
					while($row3 = $result3->fetch_assoc()){
						$total1_balance = $row3['balance'];
						if(is_null($total1_balance)){
							$total1_balance = 0;
						}
					}
				} else{
					$total1_balance = 0;
				}
		    // End total total_Balance/mot_jer
		    //Start GB Bank Ganti
		        $gb_bank_ganti = 0;
		        $sql2 = "SELECT SUM(debit) as debit, id FROM details_sell_pathor WHERE particulars = 'BG' AND customer_id = '$customer_id' AND project_name_id = '$project_name_id'";
		        $result2 = $db->select($sql2);
		        if($result2->num_rows > 0){
		            while($row2 = $result2->fetch_assoc()){
		                $gb_bank_ganti = $row2['debit'];
		                $gb_bank_ganti_db_id = $row2['id'];
		                if(is_null($gb_bank_ganti)){
		                    $gb_bank_ganti = 0;
		                }
		            }
		        } else{
		            $gb_bank_ganti = 0;
		        }
		        
		    //End GB Bank Ganti
		//Start Total para/mot_mul_khoros_shoho
		        $paras = 0;
		        $sql2 = "SELECT SUM(paras) as paras FROM details_sell_pathor WHERE customer_id = '$customer_id' AND project_name_id = '$project_name_id'";
		        $result2 = $db->select($sql2);
		        if($result2->num_rows > 0){
		            while($row2 = $result2->fetch_assoc()){
		                $total_paras = $row2['paras'];
		                if(is_null($paras)){
		                    $paras = 0;
		                }
		            }
		        } else{
		            $paras = 0;
		        }
		    //End Total para/mot_mul_khoros_shoho

		    $nij_paona = $total_debit - $total_credit;
			$total_nij_paona = $total1_debit - $total1_credit;
		    $company_paona = ($total_debit - $total_credit) - $gb_bank_ganti;

			//Nested table
			// echo "<tr><td colspan='5' style='border: 1px solid #777 !important;'>";
			// echo "<table style='width: 100%; border-collapse:collapse;'>";
			// echo "<tr><td colspan='8' style='border: 0px; height: 15px;'></td></tr>";
			// echo "<tr>";
			// // echo "<td style='width: 170px; border: 1px solid #777 !important;'>Rod 500W/60G, Total Kg:</td>";
			// // echo "<td style='border: 1px solid #777 !important;'>" . $rod500w . " kg</td>";
			// // echo "<td style='text-align: right; border: 1px solid #777 !important;'>মোট গাড়ীঃ</td>";
			// // echo "<td style='border: 1px solid #777 !important;'>" . $total_motor . " টি</td>";
			// echo "<td style='text-align: right; border: 1px solid #777 !important;'>মোট গাড়ী ভাড়াঃ</td>";
			// echo "<td style='border: 1px solid #777 !important;'>" . $motor_vara . " টাকা</td>";
			// echo "<td style='text-align: right; border: 1px solid #777 !important;'>মোট খালাস খরচঃ</td>";
			// echo "<td style='border: 1px solid #777 !important;'>" . $unload . " টাকা</td>";
			// echo "<td style='border: 1px solid #777 !important; text-align: right;'>মোট মূলঃ</td>";
			// echo "<td style='border: 1px solid #777 !important;'>" . $total_credit . " টাকা</td>";
			// echo "</tr>";


			// echo "<tr>";
			// // echo "<td style='border: 1px solid #777 !important;'>Rod 400W/60G, Total Kg:</td>";
			// // echo "<td style='border: 1px solid #777 !important;'>" . $rod400w . " kg</td>";
			// // echo "<td style='border: 1px solid #777 !important; text-align: right;'>মোট মূলঃ</td>";
			// // echo "<td style='border: 1px solid #777 !important;'>" . $total_credit . " টাকা</td>";
			// echo "<td style='border: 1px solid #777 !important; text-align: right;'>মোট জমাঃ</td>";
			// echo "<td style='border: 1px solid #777 !important;'>" . $total_debit . " টাকা</td>";
			// echo "<td style='border: 1px solid #777 !important; text-align: right;'>মো‌ট জেরঃ</td>";
			// echo "<td style='border: 1px solid #777 !important;'>" . $total_balance . " টাকা</td>";
			// echo "<td style='text-align: right; border: 1px solid #777 !important;'>নিজ পাওনাঃ</td>";
			// echo "<td style='border: 1px solid #777 !important;'>" . $nij_paona . " টাকা</td>";
			// echo "</tr>";


			// echo "<tr>";
			// // echo "<td style='text-align: right; border: 1px solid #777 !important;'>Total Kg:</td>";
			// // echo "<td style='border: 1px solid #777 !important;'>" . $rod_total_500w_400W . " kg</td>";
			// // echo "<td style='text-align: right; border: 1px solid #777 !important;'>কোম্পানি পাওনাঃ</td>";
			// // echo "<td style='border: 1px solid #777 !important;'>" . $company_paona . " kg</td>";
			// // echo "<td style='text-align: right; border: 1px solid #777 !important;'>নিজ পাওনাঃ</td>";
			// // echo "<td style='border: 1px solid #777 !important;'>" . $nij_paona . " kg</td>";
			// // echo "<td style='text-align: right; border: 1px solid #777 !important;'>মোট মূল খরচ সহঃ</td>";
			// // echo "<td style='border: 1px solid #777 !important;'>" . $vara_credit . " টাকা</td>";
			// echo "</tr>";


			// echo "<tr>";
			// // echo "<td style='text-align: right; border: 1px solid #777 !important;'>মোট টোনঃ</td>";
			// // echo "<td style='border: 1px solid #777 !important;'>" . $total_ton . " tonne</td>";
			// // echo "<td style='text-align: right; border: 1px solid #777 !important;'>মোট cft :</td>";
			// // echo "<td style='border: 1px solid #777 !important;'>" . $total_shift . " tonne</td>";
			// echo "</tr>";
			// echo "</table>";
			// echo "</td></tr>";
			// echo "<tr><td colspan='6' style='border-left: 1px solid transparent; border-right: 1px solid transparent; border-bottm: 1px solid #777; border-top: 1px solid #777; height: 70px;'></td></tr>";
			// echo "<tr>";
			// // echo "<th style='border: 1px solid #777 !important;'>".$i."</th>";
			// echo "<th style='border: 1px solid #777 !important;'>ডিলার আই.ডি</th>";
			// echo "<th style='border: 1px solid #777 !important;'>ডিলার নাম</th>";
			// echo "<th style='border: 1px solid #777 !important;'>মোট গাড়ী ভাড়াঃ</td>";
			// echo "<th style='border: 1px solid #777 !important;'>মোট খালাস খরচঃ</td>";

			// echo "<th style='border: 1px solid #777 !important;'>মোট মূলঃ</th>";
			// echo "<th style='border: 1px solid #777 !important;'>মোট জমাঃ</th>";
			// echo "<th style='border: 1px solid #777 !important;'>মো‌ট জেরঃ</th>";
			// echo "<th style='border: 1px solid #777 !important;'>নিজ পাওনাঃ</th>";
			//  echo "</tr>"; 


			 echo "<tr>";
			//  echo "<td style='border: 1px solid #777 !important;'></td>";
			echo "<td  style='border: 1px solid #777 !important;'>".$i."</td>";
			echo "<td style='border: 1px solid #777 !important;'>".$customer_id."</td>";
			echo "<td style='border: 1px solid #777 !important;'>".$row['customer_name']."</td>";
			echo "<td style='border: 1px solid #777 !important;'>".$motor_vara." টাকা</td>";
			echo "<td style='border: 1px solid #777 !important;'>".$unload." টাকা</td>";	
			echo "<td style='border: 1px solid #777 !important;'>".$total_credit." টাকা</td>";
			echo "<td style='border: 1px solid #777 !important;'>".$total_debit." টাকা</td>";
			echo "<td style='border: 1px solid #777 !important;'>".$total_balance." টাকা</td>";
			echo "<td style='border: 1px solid #777 !important;'>".$nij_paona." টাকা</td>";
			 echo "</tr>";




			$i++;
		}
		echo"<td style='text-align: left; border: 1px solid #777 !important;'></td>";
			echo"<td style='text-align: left; border: 1px solid #777 !important;'></td>";
			echo"<td style='text-align: left; border: 1px solid #777 !important;'></td>";
			echo"<td style='text-align: left; border: 1px solid #777 !important;'>total = ".$total_motor_vara. "টাকা</td>";
		    echo"<td style='text-align: left; border: 1px solid #777 !important;'>total = ".$total_unload. "টাকা</td>";
		    echo"<td style='text-align: left; border: 1px solid #777 !important;'>total = ".$total1_credit." টাকা </td>";
		    echo"<td style='text-align: left; border: 1px solid #777 !important;'>total = ".$total1_debit." টাকা </td>";
		    echo"<td style='text-align: left; border: 1px solid #777 !important;'>total = ".$total1_balance." টাকা </td>";
		    echo"<td style='text-align: left; border: 1px solid #777 !important;'>total = ".$total_nij_paona." টাকা </td>";
	}
}



















