var myApp = angular.module('myApp', []);

myApp.controller('namesCtrl', function($scope, $filter) {
		$scope.triggerForm = false;
		$scope.editForm = false;
		$scope.addForm = false;
		$scope.order = 'name';

    $scope.users = [
        {id: 1, name:'Jani',country:'Norway', salary: 5, email: 'Guithay65@gustr.com'},
        {id: 2, name:'Carl',country:'Sweden', salary: 24, email: 'cluphetret@hotmail.com'},
        {id: 3, name:'Margareth',country:'England', salary: 5, email: 'phitrudreh@yahoo.com'},
        {id: 4, name:'Hege',country:'Norway', salary: 15, email: 'thapripich@gmail.com'},
        {id: 5, name:'Joe',country:'Denmark', salary: 20, email: 'qakyssaxisu-3687@yopmail.com'}
        ];
  
  	
  
    $scope.orderBy = function(filter){
    	$scope.order = filter;
    };
	
		$scope.editUser = function(user){
			var index = $scope.users.indexOf(user);
			$scope.triggerForm = true;
			$scope.editForm = true;
			$scope.addForm = false;
			$scope.emailExisted = false;
			$scope.editUserId = index;
			$scope.crudFormName = $scope.users[index].name;
			$scope.crudFormCountry = $scope.users[index].country;
			$scope.crudFormSalary = $scope.users[index].salary;
			$scope.crudFormEmail = $scope.users[index].email;
		};
		
		$scope.saveEdit = function(userId){
			if(userId == 'new'){
				var newUser = {
					name: $scope.crudFormName,
					country: $scope.crudFormCountry,
					salary: $scope.crudFormSalary,
					email: $scope.crudFormEmail					
				}
				$scope.users.push(newUser);
			}
			else {
				$scope.users[userId].name = $scope.crudFormName;
				$scope.users[userId].country = $scope.crudFormCountry;
				$scope.users[userId].salary = $scope.crudFormSalary;
				$scope.users[userId].email = $scope.crudFormEmail;				
			}
			
			$scope.triggerForm = false;
			$scope.editForm = false;
			$scope.editUserId = 0;			
		}
	
		$scope.deleteUser = function(user) {
			var index = $scope.users.indexOf(user);
			$scope.users.splice(index, 1);  	
		}
  	
		$scope.addUser = function(){
			$scope.editUserId = 'new';
			$scope.triggerForm = true;
			$scope.editForm = false;
			$scope.addForm = true;
			$scope.emailExisted = false;
			$scope.userForm.$setUntouched();
			$scope.crudFormName = '';
			$scope.crudFormCountry = '';
			$scope.crudFormSalary = '';
			$scope.crudFormEmail = '';			
		}
		$scope.checkEmail = function(userId){
			
			if(userId === 'new' || $scope.crudFormEmail !== $scope.users[userId].email){
				$scope.emailExisted = $scope.users.some(function(user){
					return user.email === $scope.crudFormEmail;
				});				
			}
		}
});

myApp.filter('totalSalary', function(){
  return function(data, key){
			if(angular.isUndefined(data) && angular.isUndefined(key))
				return 0;
      var total = 0;
      angular.forEach(data, function(v, k){
				total+=parseInt(v[key]);
			});
      return total;
  }
});