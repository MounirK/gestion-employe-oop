<?php
	if(isset($_POST['id'])){
		$existEmploye = new EmployesController();
		$employe = $existEmploye->getOneEmploye();
	}else{
		Redirect::to('home');
	}
	if(isset($_POST['submit'])){
		$existEmploye = new EmployesController();
		$existEmploye->updateEmploye();
	}
?>

<div class="container">
	<div class="row mt-4"> 
		<div class="col-md-10 mx-auto">
			<div class="card">
				<h5 class="card-header">Modifier un employé</h5>
				<div class="card-body bg-light">
					<a href="<?php echo BASE_URL; ?>" class="btn btn-sm btn-secondary my-2">
						<i class="fas fa-home"></i>
					</a>
					<form method="post">
						<div class="form-group">
							<label for="nom">Nom*</label>
							<input type="text" name="nom" class="form-control" placeholder="Nom" 
							value="<?php echo $employe->nom ?>">
						</div>
						<div class="form-group">
							<label for="prenom">Prénom*</label>
							<input type="text" name="prenom" class="form-control" placeholder="Prénom"
							value="<?php echo $employe->prenom ?>">
						</div>
						<div class="form-group">
							<label for="mat">Matricule*</label>
							<input type="text" name="mat" class="form-control" placeholder="Matricule"
							value="<?php echo $employe->matricule ?>">
						</div>
						<div class="form-group">
							<label for="depart">Département*</label>
							<input type="text" name="depart" class="form-control" placeholder="Département"
							value="<?php echo $employe->depart ?>">
							<input type="hidden" name="id" value="<?php echo $employe->id ?>">
						</div>
						<div class="form-group">
							<label for="poste">Poste*</label>
							<input type="text" name="poste" class="form-control" placeholder="Poste"
							value="<?php echo $employe->poste ?>">
						</div>
						<div class="form-group">
							<label for="date_emb">Date Embauche*</label>
							<input type="date" name="date_emb" class="form-control" placeholder="Date Embauche">
						</div>
						<div class="form-group">
							<label for="statut">Statut*</label>
							<select class="form-control" name="statut">
								<option value="1" <?php echo $employe->statut ? 'selected' : ''; ?> >Active</option>
								<option value="0" <?php echo !$employe->statut ? 'selected' : ''; ?> >Résilié</option>
							</select>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary" name="submit">Valider</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>