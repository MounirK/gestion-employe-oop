<?php
	if(isset($_POST['find'])){
		$data = new EmployesController();
		$employes = $data->findEmployes();
	}else{
		$data = new EmployesController();
		$employes = $data->getAllEmployes();
	}
	
?>

<div class="container">
	<div class="row mt-4"> 
		<div class="col-md-10 mx-auto">
			<?php include('./views/includes/alerts.php'); ?>
			<div class="card">
				<div class="card-body bg-light">
					<a href="<?php echo BASE_URL; ?>add" class="btn btn-sm btn-primary my-2">
						<i class="fas fa-plus"></i>
					</a>
					<a href="<?php echo BASE_URL; ?>" class="btn btn-sm btn-primary my-2">
						<i class="fas fa-home"></i>
					</a>
					<a href="<?php echo BASE_URL; ?>logout" title="Déconnexion" class="btn btn-link my-2">
						<i class="fas fa-user"> <?php echo $_SESSION['username']; ?></i>
					</a>
					<form class="float-right mb-2 d-flex flex-row" method="post">
						<input type="text" name="search" class="form-control" placeholder="Recherche">
						<button class="btn btn-info btn-sm" name="find" type="submit">
							<i class="fas fa-search"></i>
						</button>
					</form>
					<table class="table table-hover">
					  <thead>
					    <tr>
					        <th scope="col">Nom & Prénom</th>
					        <th scope="col">Matricule</th>
					        <th scope="col">Département</th>
					        <th scope="col">Post</th>
					        <th scope="col">Date Embauche</th>
					        <th scope="col">Status</th>
					        <th scope="col">Action</th>
					    </tr>
					    </thead>
					    <tbody>
						   <?php foreach($employes as $employe): ?>
							    <tr>
							      <td><?php echo $employe['nom'] .' '. $employe['prenom'] ?></td>
							      <td><?php echo $employe['matricule'] ?></td>
							      <td><?php echo $employe['depart'] ?></td>
							      <td><?php echo $employe['poste']?></td>
							      <td><?php echo $employe['date_emb'] ?></td>
							      <td>
							      	<?php 
							      		echo $employe['statut']?'<span class="badge badge-success">Active</span>' :
								    	'<span class="badge badge-danger">Résillié</span>';
							      	?>
							      </td>
							      <td class="d-flex flex-row">
							      	<form method="post" class="mr-1" action="update">
							      		<input type="hidden" name="id" value="<?php echo $employe['id']; ?>">
							      		<button class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
							      	</form>
							      	<form method="post" class="mr-1" action="delete">
							      		<input type="hidden" name="id" value="<?php echo $employe['id']; ?>">
							      		<button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
							      	</form>
							      </td>
							    </tr>
						   <?php endforeach; ?>
					    </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>