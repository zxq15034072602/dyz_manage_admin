var cases = new Object();
cases.loadRegions = function(parent,target,selected)
{
  $.ajax({
	  url:'http://app.duyiwang.cn/index.php?action=region&dir=admin&do=ajax_case',
	  type:'post',
      dataType:'json',
      data:{id:parent},
      success:function(res){
    	  if(res.code=="200"&&res.cases){
    		  var select=$('#'+target);
    		  select.empty();
    		  var option=$("<option value='0'>请选择</option>");
    		  select.append(option);

    		  $.each(res.cases,function(i,v){
    			  if(selected==v.id){
    				  var option=$('<option value='+v.id+' selected>'+v.name+'</option>');
    			  }else{
    				  var option=$('<option value="'+v.id+'">'+v.name+'</option>');
    			  }
    			  select.append(option);
    		  });
    	  }
      }
  });
}
/* *
 * 载入指定的省份下所有的城市
 *
 * @province    integer 省份的编号
 * @selName     string  列表框的名称
 */
cases.loadCities = function(province, selName,selected)
{
  var objName = (typeof selName == "undefined") ? "selCities" : selName;
 
  cases.loadRegions(province,objName,selected);
}

/* *
 * 处理下拉列表改变的函数
 *
 * @obj     object  下拉列表
 * @type    2市级 3地区
 * @selName string  目标列表框的名称
 */
cases.changed = function(obj,selName)
{
  var parent = obj.options[obj.selectedIndex].value;
  cases.loadRegions(parent,selName,0);
}


