<?php 

	include_once('include/authenticate.php');
	include_once('include/headers.php'); 
	include_once('include/connection.php');
	include_once('include/functions.php');
	?>


<?php

									$data = array();
									$index = array();
									$query = mysql_query("SELECT id, parent_id, name FROM category_master ORDER BY name");
									while ($row = mysql_fetch_assoc($query)) {
										$id = $row["id"];
										$parent_id = $row["parent_id"] === NULL ? "NULL" : $row["parent_id"];
										$data[$id] = $row;
										$index[$parent_id][] = $id;
									}
									/*
									 * Recursive top-down tree traversal example:
									 * Indent and print child nodes
									 */
									function display_child_nodes($parent_id, $level)
									{
										global $data, $index;
										$parent_id = $parent_id === NULL ? "NULL" : $parent_id;
										if (isset($index[$parent_id])) {
											foreach ($index[$parent_id] as $id) {
												
												$indent=str_repeat("-",$level);
												if($data[$id]["id"]==71){
													echo $indent.$data[$id]["name"];
												}
												//echo $indent.$data[$id]["id"];
												//echo '<br/>';
												display_child_nodes($id, $level + 1);
												
											}
											
										}
									}
									display_child_nodes(0, 0);
										
								?>

