<?php
	class Employe {
		static public function getAll(){
			$stmt = DB::connect()->prepare('SELECT * FROM employe');
			$stmt->execute();
			return $stmt->fetchall();
			$stmt->close();
			$stmt = null;
		}

		static public function getEmploye($data){
			$id = $data['id'];
			try{
				$query = 'SELECT * FROM employe WHERE id=:id';
				$stmt = DB::connect()->prepare($query);
				$stmt->execute(array(":id" => $id));
				$employe = $stmt->fetch(PDO::FETCH_OBJ);
				return $employe;
			}catch(PDOException $ex){
				echo 'erreur' . $ex->getMessage(); 
			}
		}

		static public function add($data){
			$stmt = DB::connect()->prepare('INSERT INTO employe(nom,prenom,matricule,depart,poste,date_emb,statut) VALUES (:nom,:prenom,:matricule,:depart,:poste,:date_emb,:statut)');
			$stmt->bindParam(':nom', $data['nom']);
			$stmt->bindParam(':prenom', $data['prenom']);
			$stmt->bindParam(':matricule', $data['matricule']);
			$stmt->bindParam(':depart', $data['depart']);
			$stmt->bindParam(':poste', $data['poste']);
			$stmt->bindParam(':date_emb', $data['date_emb']);
			$stmt->bindParam(':statut', $data['statut']);

			if($stmt->execute()){
				return 'ok';
			}else{
				return 'error';
			}	
			$stmt->close();
			$stmt = null;
		}

		static public function update($data){
			$stmt = DB::connect()->prepare('UPDATE employe SET
				nom = :nom,
				prenom = :prenom,
				matricule = :matricule,
				depart = :depart,
				poste = :poste,
				date_emb = :date_emb,
				statut = :statut 
				WHERE id = :id');
			$stmt->bindParam(':id', $data['id']);
			$stmt->bindParam(':nom', $data['nom']);
			$stmt->bindParam(':prenom', $data['prenom']);
			$stmt->bindParam(':matricule', $data['matricule']);
			$stmt->bindParam(':depart', $data['depart']);
			$stmt->bindParam(':poste', $data['poste']);
			$stmt->bindParam(':date_emb', $data['date_emb']);
			$stmt->bindParam(':statut', $data['statut']);
			// die(print_r($data));
			if($stmt->execute()){
				return 'ok';
			}else{
				return 'error';
			}	
			$stmt->close();
			$stmt = null;
		}

		static public function delete($data){
			$id = $data['id'];
			try{
				$query = 'DELETE FROM employe WHERE id=:id';
				$stmt = DB::connect()->prepare($query);
				$stmt->execute(array(":id" => $id));
				if($stmt->execute()){
					return 'ok';
				}else{
					return 'error';
				}	
			}catch(PDOException $ex){
				echo 'erreur' . $ex->getMessage(); 
			}
		}


		public function searchEmploye($data){
			$search = $data['search'];
			try{
				$query = 'SELECT * FROM employe WHERE nom LIKE ? OR prenom LIKE ?';
				$stmt = DB::connect()->prepare($query);
				$stmt->execute(array('%'.$search.'%','%'.$search.'%'));
				$employes = $stmt->fetchAll();
				return $employes;
			}catch(PDOException $ex){
				echo 'erreur' . $ex->getMesage();
			}	
		}
	}

?>