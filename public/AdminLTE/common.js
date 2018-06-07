
/**
 * Khi set dữ liệu JSON từ controller của Java,
 * Nếu object trong java NULL, thì Gson sẽ trả ra là Rỗng
 * DO vậy nếu set vào biến Javascript sẽ bị lỗi cú pháp.
 * Để tránh trường hợp lỗi cú pháp, thì sử dụng các function Nvl* để xử lý.
 * 
 * Ví dụ:
 *         Code có khả năng bị lỗi: (nếu listMasterCycleType = RỖNG)
 *             Code JSP: $scope.listMasterCycleType = ${listMasterCycleType};
 *             Code Javascript: $scope.listMasterCycleType = ;
 *         Code đúng: (Sử dụng NvlObject)
 *             Code JSP: $scope.listMasterCycleType = NvlArray(${listMasterCycleType});
 *             Code Javascript: $scope.listMasterCycleType = NvlArray();
 * @param data
 * @returns {String}
 */
function NvlString(data) {
    return data || "";
}

function NvlNumber(data) {
    return data || 0;
}

function NvlArray(data) {
    return data || [];
}

function NvlBoolean(data) {
    return data || false;
}

function NvlObject(data) {
    return data || {};
}


function randomId () {
  // Math.random should be unique because of its seeding algorithm.
  // Convert it to base 36 (numbers + letters), and grab the first 9 characters
  // after the decimal.
  var id = Math.random().toString(36)/*.substr(2, 9)*/;
  return id.replace(/[^a-zA-Z0-9]/g,'');
}

function d2tConfirmDelete(fCallback, message) {
    $.confirm({
        title: 'Xác nhận!',
        content: message || 'Bạn có chắc chắn muốn xóa?',
        buttons: {
            confirm: {
                text: 'Đồng ý',
                keys: ['enter'],
                btnClass: 'btn-success',
                action: function () {
                    if (typeof fCallback == 'function') {
                        fCallback();
                    }
                }
            },
            cancel: {
                keys: ['esc'],
                btnClass: 'btn-red',
                text: 'Hủy bỏ',
            }
        }
    });

    return false;
}


function d2tConfirmSave(fCallback, message) {
    $.confirm({
        title: 'Xác nhận!',
        content: message || 'Bạn có chắc chắn muốn lưu?',
        buttons: {
            confirm: {
                text: 'Đồng ý',
                keys: ['enter'],
                btnClass: 'btn-success',
                action: function () {
                    if (typeof fCallback == 'function') {
                        fCallback();
                    }
                }
            },
            cancel: {
                keys: ['esc'],
                btnClass: 'btn-red',
                text: 'Hủy bỏ',
            }
        }
    });

    return false;
}

function d2tAlert(content, title) {
    $.alert({
        title: title || 'Có lỗi xảy ra',
        icon: 'fa fa-warning',
        type: 'red',
        content: content,
    });
}


/**
 * Formar date time
 */
function dateformat (input, type){
    if (!input) {
        return input;
    }
    if (!type) {
        type = "DD/MM/YYYY";
    }

    return moment(input).set("locale", "vi").format(type);
}

/**
 * Format dateRange
 * @param input
 * @param type
 * @returns
 */
function dateRangeformat (startDate, endDate, type){
    var aryTmp = [];
    
    if (startDate) {
        aryTmp.push(dateformat (startDate, type));
    }
    
    if (endDate) {
        aryTmp.push(dateformat (endDate, type));
    }

    return aryTmp.join(' - ');
}

/**
 * ham dateranger get gia tri startDate
 */
function dateRangeStartDate(input, type) {
    if(typeof input === 'object') {
        return dateformat(input.startDate, type)
    } else if (typeof input === 'string') {
        if(input.split("-").length > 0) {
            return input.split("-")[0].trim();
        }
    }
    return "";
}

/**
 * ham dateranger get gia tri endDate
 */
function dateRangeEndDate(input, type) {
    if(typeof input === 'object') {
        return dateformat(input.endDate, type);
    } else if (typeof input === 'string') {
        if(input.split("-").length > 1) {
            return input.split("-")[1].trim();
        }
    }
    return "";
}