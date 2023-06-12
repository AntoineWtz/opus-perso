<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('dashboard');
</head>
<body>
        <?php 
          echo $publications;
        ?>
    <div>
        <table  class="table-auto w-full">
            <tr class='text-left'>
                <th class="w-8">titre</th>
                <th class="w-8">description</th>
                <th class="w-5">Date Creation</th>
                <th class="w-5">Date Mofication</th>
                <th class="w-2"></th>
                <th class="w-2"></th>
                <th class="px-4 w-1/6"></th>
                <th class="px-4 w-1/6"></th>
            </tr>
        @foreach ($publications as $publication)
         <tr class='border-collapse text-left'>
            <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$publication->titre}}</td>
            <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$publication->descriptif}}</td>
            <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$publication->created_at}}</td>
            <td class='px-4 border-l-2 border-y-2 border-gray-200 border-solid  bg-gray-50'>{{$publication->updated_at}}</td>
         </tr>
        @endforeach
         </table>
    </div>
    
</body>
</html>