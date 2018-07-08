$('#addForm').submit((e)=>{
	e.preventDefault();
	let data = $('#addForm').serialize();
	$.ajax({
			url:'ajax.php?type=add',
			method:'POST',
			data:data,
			success:(res)=>{
				//window.location.reload();
				Persons.reloadData();
				$('#addForm').reset;
			}
	});
	
});

$('#editForm').submit((e)=>{
	e.preventDefault();
	let data = $('#editForm').serialize();
	const id = $('#editForm').attr('data-person-id');
	
	$.ajax({
			url:'ajax.php?type=update&id='+id,
			method:'POST',
			data:data,
			success:(res)=>{
				//window.location.reload();
				Perons.reloadData();
			}
	});
});

//load table
$.ajax({
	url:'ajax.php',
		method:'GET',
		success:(res)=>{
			const data = eval(res);
			let tbody = '';
			
			$.each( data, (key,value)=> {	
				//slet tr = $.create('tr');
				//tr.append()
				let tr = "<tr>";
					  tr +="<td>"+value.id+"</td>";
					  tr +="<td>"+value.first_name+"</td>";
					  tr +="<td>"+value.last_name+"</td>";
					  tr +="<td>"+value.contact_number+"</td>";
					  tr +="<td>";
					  tr +="<a href='#' class='delBtn btn btn-danger' onclick=Persons.deleteData('"+value.id+"')>Delete</a> "; 
					  tr +="<a href='#' data-person-id='"+value.id+"' id='editBtn' class='displayBtn btn btn-success' data-toggle='modal' data-target='#editModal' onclick=Persons.displayData('"+value.id+"')>Edit</a>";
					  tr +="</td>";
					  tr +="</tr>";
				tbody +=tr;
				$('#tbody').html(tbody);

			});
		}
});
//$(".table").DataTables();


