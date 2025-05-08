<?php include("database.php"); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.4/dist/tailwind.min.css" rel="stylesheet">
    <title>ToDo-List</title>
</head>
<style>
    body{
        background-color: antiquewhite;
    }
</style>
<body>
    <div class="flex justify-center ">
        <div class="font-bold text-sm p-44">
        <h1 class="pb-3">My Daily Drive</h1>
        
        <form action="index.php" method="POST" class="text-center  " >

        <input type="text" name="task" placeholder="Add new task" class="border p-2  text-sm w-96" required >
        <button type="submit" name="submit" class="border p-2  w-28 rounded-md bg-white"> Add</button>
        

</form> <br>

<table class="min-w-full table-auto border border-gray-300 shadow-md rounded-lg overflow-hidden p-10">
  <thead class="bg-gray-100 pt-5">
    <tr>
      <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 border-b border-gray-300">No:</th>
      <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 border-b border-gray-300">Task</th>
      <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 border-b border-gray-300">Action</th>
    </tr>
  </thead>
  <tbody>
   
    <?php 
while ($row = mysqli_fetch_array($tasks)){


?> <tr class="hover:bg-gray-50">
<td class="px-6 py-4 border-b border-gray-200"><?php echo $row['id']; ?></td>
<td class="px-6 py-4 border-b border-gray-200"><?php echo $row['task']; ?></td>
<td class="px-6 py-4 border-b border-gray-200"><form action="index.php" method="POST" style="display:inline;">
  <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
  <button type="submit" name="delete_task" class="border p-2 bg-white w-24 rounded-md">Delete</button>
  <button type="submit" name="update_task" class="border p-2 bg-white w-24 rounded-md">Update</button>
</form>
</td>
</tr><?php }?>
  </tbody>
</table>

</div>
       

        
   
  
    </div>
    

</body>
</html>