var app = angular.module('app', ['ui.select2'], function($interpolateProvider) {
    $interpolateProvider.startSymbol('[{');
    $interpolateProvider.endSymbol('}]');
});

app.controller('MainController', ['$scope', '$http', '$filter', '$timeout', function($scope, $http, $filter, $timeout) {
    
    /**
      Logic xu ly cho checked list
    */
    $scope._selecteManage = {
        selected: {},
        selectAllFlag: false
    };
    // Check all
    $scope.toggleAll = function (selecteManag) {
        $timeout(function() {
            for (var id in selecteManag.selected) {
                if (selecteManag.selected.hasOwnProperty(id)) {
                    selecteManag.selected[id] = selecteManag.selectAllFlag;
                }
            }
        });
    };

    // check one
    $scope.toggleOne = function (selecteManag) {
        $timeout(function() {
            for (var id in selecteManag.selected) {
                if (selecteManag.selected.hasOwnProperty(id)) {
                    if (!selecteManag.selected[id]) {
                        selecteManag.selectAllFlag = false;
                        return;
                    }
                }
            }
            selecteManag.selectAllFlag = true;
        });
    };

        
    /**
     * Tìm 1 object trong list theo điều kiện chỉ định
     */
    $scope.getObjectInList = function(list, filterExpression) {
        var listChecked = $filter('filter')(list, filterExpression, true);
        return (listChecked && listChecked.length) ? listChecked[0] : {};
    }


    $scope.d2tConfirmDelete = function(fCallback, message) {
        return d2tConfirmDelete(fCallback, message);
    }
    $scope.d2tConfirmSave = function(fCallback, message) {
        return d2tConfirmSave(fCallback, message);
    }
    $scope.d2tAlert = function(content, title) {
        return d2tAlert(content, title);
    }
}]);


app.directive('icheck', ['$timeout', '$parse', function($timeout, $parse) {
  return {
    restrict: 'A',
    require: '?ngModel',
    link: function(scope, element, attr, ngModel) {
      $timeout(function() {
        var value = attr.value;
      
       function update(checked) {
          if(attr.type==='radio') {
              ngModel && ngModel.$setViewValue(value);
          } else {
              ngModel && ngModel.$setViewValue(checked);
          }
        }

       $(element).iCheck({
          checkboxClass: attr.checkboxClass || 'icheckbox_square-blue',
          radioClass: attr.radioClass || 'iradio_square-blue'
        }).on('ifChanged', function(e) {
          scope.$apply(function() {
            update(e.target.checked);
          });
        }).on('ifClicked', function(e) {
            if(attr.ngClick) {
                $timeout(function() {
                    scope.$eval(attr.ngClick);
                });
            }
        });
        
       if(attr.type==='radio') {
            if (ngModel && ( ngModel.$modelValue == attr.value)) {
                $(element).iCheck('check');
            }
        } else if (ngModel && ngModel.$modelValue) {
            $(element).iCheck('check');
        }

       scope.$watch(attr.ngChecked, function(checked, oldValue) {
            if (checked === oldValue) {
                return;
            }
          if(typeof checked === 'undefined') checked = (ngModel && !!ngModel.$viewValue);
          update(checked);
        }, true);

       scope.$watch(attr.ngModel, function(model, oldValue) {
            if (model === oldValue) {
                return;
            }
          $(element).iCheck('update');
        }, true);
        
     })
    }
  }
}]);



/**
 * Chuyen doi ky tu \n ==> <br />
 * Cho cac ky tu xuong dong thuoc loai free text
 */
app.filter("nl2br", function(){
    var strConvert = function (text){
        return text ? text.replace(/\n/g, '<br />') : '';
    }
    return strConvert;
});

/**
 * Format ngay thang
 * Cac dung: 
 *     vi du: 
 *     formart validTime co ca gio phut giay
 *         {{validTime | dateformat:'DD/MM/YYYY HH:mm:ss' }}
 *     formart validTime theo mac dinh ('DD/MM/YYYY')
 *         {{validTime | dateformat }}
 */
app.filter("dateformat", function(){
    return function (input, type){
        return dateformat(input, type);
    }
});
app.filter("dateRangeformat", function(){
    return function (startDate, endDate, type){
        return dateRangeformat (startDate, endDate, type);
    }
});

//Format dateRanger
app.filter("dateRangeStartDate", function(){
    return dateRangeStartDate;
});
app.filter("dateRangeEndDate", function(){
    return dateRangeEndDate;
});