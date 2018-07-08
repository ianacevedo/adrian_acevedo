class Persons 
{
	static displayData(id){
		$.ajax({
				url:'ajax.php?type=get&id='+id,
				method:'GET',			
				success:(res)=>{
					const data = eval(res);
					const id = data[0].id;
					const fname = data[0].first_name;
					const lname = data[0].last_name;
					const cnumber = data[0].contact_number;
					
					$('.fname').val(fname);
					$('.lname').val(lname);
					$('.cnumber').val(cnumber);
					$('#editForm').attr('data-person-id',id);
				}
		});
	}

	static deleteData(id){
		$.ajax({
				url:'ajax.php?type=delete&id='+id,
				method:'GET',			
				success:(res)=>{
					window.location.reload();
				}
		});

	}

    static reloadData(){
		$.ajax({
		url:'ajax.php',
		method:'GET',
		success:(res)=>{
			const data = eval(res);
			let tbody = '';
			
			$.each( data, (key,value)=> {	
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
	
	}
}
