 
 $sql = "select top 30  author, count(author) as cnt, sum(net_votes) as votes, sum(pending_payout_value) as pending_payout_value from 
   Comments 
where 
   title <> '' and 
   dirty = 'False' and 
   category = 'cn' and 
   parent_author = '' and 
   datediff(hour, created, GETDATE()) between 0 and 7*24 
group by 
   author 
order by 
  pending_payout_value desc";
 
 $rs = mssql_query($sql,$conn);
 echo mssql_num_rows($rs);
 
 $result = array();
 while($row=mssql_fetch_array($rs))
 {
	 $result[] = $row;
 }
echo '<pre/>';print_r($result);

 mssql_close($conn);
