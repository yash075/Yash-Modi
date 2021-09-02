
    <body>
    <form action="course_details_delete_checkbox.php" method="post">
                                        <input type="checkbox" id="checkAl" ><label style="color:blue;"> Select All</label>
                                            &emsp;
                                             <input type="submit" name="add" value="Add">
									
											<table border="2" >
												<thead>
													<tr style="color:blue;font-size:20px;text-align:center;">
                                                        <th ></th>
                                                        <th >No.</th>
														<th >Code</th>
														<th >Name</th>
														<th >Type</th>
                                                        <th >Edit</th>
													</tr>
													</thead>
													
													<?php
														
                                                        include '../admin/connection.php';
     
														$sql = "select * from course order by course_name,course_code;";
							
														$result = mysqli_query($con,$sql);
                                                        
                                                        $no = 1;    
							
														while($row=mysqli_fetch_assoc($result))
														{
													?>
                                                     <tbody>   
													<tr>
                                                        <td><input type="checkbox" id="checkItem" name="check[]" value="<?php echo $row["course_id"]; ?>"><!--<label><?php //echo $row["course_id"]; ?></label>--></td>
                                                        <td style="color:blue;"><?php echo $no;?></td>
														<td><?php echo $row['course_code'];?></td>
														<td><?php echo $row['course_name'];?></td>
														<td><?php echo $row['course_type'];?></td>
													   <td><a href="course_details_update.php?id=<?php echo $row['course_id'];?>" style="color:green;text-decoration:none;"><i class="fa fa-edit m-r-10" style="font-size:18px" aria-hidden="true"></i></a></td>
													</tr>
													<?php
                                                            $no++;
														}
													?>	
												</tbody>
											</table>
                                        <script>
    $("#checkAl").click(function () {
    $('input:checkbox').not(this).prop('checked', this.checked);
    });
    </script>
									
                                    </form>
    </body>