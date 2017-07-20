function doPrint(a,b,c,d,e,f,g,h,i,j,k,l,m,n,p)  { 
//介休 
	var myDate = new Date();
	var year = myDate.getFullYear();    //获取完整的年份(4位,1970-????)
	var month = myDate.getMonth()+1;       //获取当前月份(0-11,0代表1月)
	var day = myDate.getDate();       //获取当前日(1-31)
	alertMsg.confirm("确定打印！", {
			okCall: function(){
				//$.post(url, data, DWZ.ajaxDone, "json");
					var myDoc ={  
						marginIgnored:true,
						settings:{        
							paperWidth : 2100,
							paperHeight : 990,
							orientation : 1 
							},
						documents:{html:['<div style="margin-top:230px;margin-left:500px;width:140px;height:35px;background:green;float:left;"><div style="padding-top:14px;padding-left:35px;">'+a+'</div></div><div position: absolute; top:10px;left:10px;></div><div style="margin-top:300px;margin-left:-460px;width:120px;height:35px;background:green;float:left;"><div style="padding-top:14px;padding-left:30px;">'+b+'</div></div><div style="margin-top:300px;margin-left:-317px;width:315px;height:35px;background:green;float:left;"><div style="padding-top:14px;padding-left:79px;">'+c+'</div></div><div position: absolute; top:10px;left:10px;></div><div style="margin-top:345px;margin-left:-460px;width:100px;height:40px;background:green;float:left;"><div style="padding-top:18px;padding-left:30px;">'+d+'</div></div><div style="margin-top:345px;margin-left:-317px;width:315px;height:35px;background:green;float:left;"><div style="padding-top:14px;padding-left:79px;">'+e+'</div></div><div position: absolute; top:10px;left:10px;></div><div style="margin-top:389px;margin-left:-460px;width:200px;height:35px;background:green;float:left;"><div style="padding-top:18px;padding-left:30px;">'+f+'</div></div><div style="margin-top:389px;margin-left:-240px;width:240px;height:35px;background:green;float:left;"><div style="padding-top:20px;padding-left:79px;">'+g+'</div></div><div position: absolute; top:10px;left:10px;></div><div style="margin-top:445px;margin-left:-460px;width:210px;height:35px;background:green;float:left;"><div style="padding-top:14px;padding-left:30px;">'+h+'</div></div><div position: absolute; top:10px;left:10px;></div><div style="margin-top:508px;margin-left:-460px;width:200px;height:35px;background:green;float:left;"><div style="padding-top:14px;padding-left:30px;">'+i+'</div></div><div style="margin-top:513px;margin-left:-200px;width:200px;height:35px;background:green;float:left;"><div style="padding-top:10px;padding-left:123px;">'+j+'</div></div><div position: absolute; top:10px;left:10px;></div><div style="margin-top:553px;margin-left:-460px;width:200px;height:35px;background:green;float:left;"><div style="padding-top:14px;padding-left:30px;">BD/GPS</div></div><div style="margin-top:560px;margin-left:-200px;width:200px;height:35px;background:green;float:left;"><div style="padding-top:10px;padding-left:123px;">GSM</div></div><div position: absolute; top:10px;left:10px;></div><div style="margin-top:605px;margin-left:-460px;width:200px;height:35px;background:green;float:left;"><div style="padding-top:14px;padding-left:30px;">'+k+'</div></div><div style="margin-top:605px;margin-left:-200px;width:200px;height:35px;background:green;float:left;"><div style="padding-top:14px;padding-left:123px;">'+l+'</div></div><div position: absolute; top:10px;left:10px;></div><div style="margin-top:653px;margin-left:-460px;width:200px;height:35px;background:green;float:left;"><div style="padding-top:14px;padding-left:30px;">'+m+'</div></div><div style="margin-top:658px;margin-left:-200px;width:200px;height:35px;background:green;float:left;"><div style="padding-top:10px;padding-left:123px;">'+n+'</div></div><div position: absolute; top:10px;left:10px;></div><div style="margin-top:706px;margin-left:-460px;width:200px;height:35px;background:green;float:left;"><div style="padding-top:14px;padding-left:30px;">'+p+'</div></div><div style="margin-top:712px;margin-left:-200px;width:200px;height:35px;background:green;float:left;"><div style="padding-top:10px;padding-left:123px;">4001010556</div></div><div position: absolute; top:10px;left:10px;></div><div style="margin-top:920px;margin-left:-310px;width:100px;height:35px;background:blue;float:left;"><div style="padding-top:20px;padding-left:118px;">'+year+'</div></div><div style="margin-top:920px;margin-left:-250px;width:100px;height:35px;background:blue;float:left;"><div style="padding-top:20px;padding-left:122px;">'+month+'</div></div><div style="margin-top:920px;margin-left:-193px;width:200px;height:35px;background:green;float:left;"><div style="padding-top:20px;padding-left:122px;">'+day+'</div></div>']},   // 要打印的div 对象在本文档中，控件将从本文档中的 id 为 'page1' 的div对象，作为首页打印 
						copyrights:'杰创软件拥有版权  www.jatools.com'          // 版权声明,必须  
						};  
						jatoolsPrinter.print(myDoc,false);
						// 直接打印，不弹出打印机设置对话框        
			}
	});
}
//普货
function doPrint1(a,b,c,d,e,f,g)  { 
//忻州市道路运输车辆动态监控设备安装如网在线证明
	var myDate = new Date();
	var year = myDate.getFullYear();    //获取完整的年份(4位,1970-????)
	var month = myDate.getMonth()+1;       //获取当前月份(0-11,0代表1月)
	var day = myDate.getDate();       //获取当前日(1-31)
	alertMsg.confirm("确定打印！", {
			okCall: function(){
				//$.post(url, data, DWZ.ajaxDone, "json");
					var myDoc ={  
						marginIgnored:true,
						settings:{        
							paperWidth : 2100,
							paperHeight : 990,
							orientation : 1 
							},
						documents:{html:['<div style="margin-top:248px;margin-left:503px;width:230px;background:green;">'+a+'</div><div style="margin-top:50px;margin-left:184px;width:155px;background:green;float:left;">冀东启明车联网服务</div><div style="margin-top:50px;margin-left:199px;width:200px;background:green;float:left;">'+b+'</div><div style="margin-top:90px;margin-left:-551px;width:120px;background:green;float:left;">'+c+'</div><div style="margin-top:90px;margin-left:-308px;width:225px;background:green;float:left;">'+d+'</div><div style="margin-top:132px;margin-left:140px;width:200px;background:green;">'+e+'</div><div style="margin-top:28px;margin-left:162px;width:200px;background:green;">'+f+'</div><div style="margin-top:403px;margin-left:455px;width:60px;background:green;float:left;">'+year+'</div><div style="margin-top:403px;margin-left:20px;width:37px;background:green;float:left;">'+month+'</div><div style="margin-top:403px;margin-left:20px;width:37px;background:green;float:left;">'+day+'</div><div style="margin-top:50px;margin-left:115px;background:red;width:20px;height:150px;float:left;">'+g+'</div>']},   // 要打印的div 对象在本文档中，控件将从本文档中的 id 为 'page1' 的div对象，作为首页打印 
						copyrights:'杰创软件拥有版权  www.jatools.com'          // 版权声明,必须  
						};  
						jatoolsPrinter.print(myDoc,false);
						// 直接打印，不弹出打印机设置对话框        
			}
	});
}
//繁峙
function doPrintfs(a,b,c,d,e,f,g)  { 
//忻州市道路运输车辆动态监控设备安装如网在线证明
	var myDate = new Date();
	var year = myDate.getFullYear();    //获取完整的年份(4位,1970-????)
	var month = myDate.getMonth()+1;       //获取当前月份(0-11,0代表1月)
	var day = myDate.getDate();       //获取当前日(1-31)
	alertMsg.confirm("确定打印！", {
			okCall: function(){
				//$.post(url, data, DWZ.ajaxDone, "json");
					var myDoc ={  
						marginIgnored:true,
						settings:{        
							paperWidth : 2100,
							paperHeight : 990,
							orientation : 1 
							},
						documents:{html:['<div style="margin-top:248px;margin-left:503px;width:230px;background:green;">'+a+'</div><div style="margin-top:50px;margin-left:184px;width:155px;background:green;float:left;">冀东启明车联网服务</div><div style="margin-top:50px;margin-left:199px;width:200px;background:green;float:left;">'+b+'</div><div style="margin-top:90px;margin-left:-551px;width:120px;background:green;float:left;">'+c+'</div><div style="margin-top:90px;margin-left:-308px;width:225px;background:green;float:left;">'+d+'</div><div style="margin-top:132px;margin-left:140px;width:200px;background:green;">'+e+'</div><div style="margin-top:28px;margin-left:162px;width:200px;background:green;">'+f+'</div><div style="margin-top:403px;margin-left:455px;width:60px;background:green;float:left;">'+year+'</div><div style="margin-top:403px;margin-left:20px;width:37px;background:green;float:left;">'+month+'</div><div style="margin-top:403px;margin-left:20px;width:37px;background:green;float:left;">'+day+'</div><div style="margin-top:50px;margin-left:115px;background:red;width:20px;height:150px;float:left;">'+g+'</div><div style="margin-top:235px;margin-left:-360px;background:red;width:140px;float:left;font-size:22px;">负责人签字：</div><div style="margin-top:440px;margin-left:-600px;width:600px;background:blue;float:left;"><p>备注：</p><p>1、本证明一式四联，运管机构、交警部门、服务商、运输经营户各留存一份。2、证明中服务单位为经省局备案、市运管局认可的社会化服务商。</p></div>']},   // 要打印的div 对象在本文档中，控件将从本文档中的 id 为 'page1' 的div对象，作为首页打印 
						copyrights:'杰创软件拥有版权  www.jatools.com'          // 版权声明,必须  
						};  
						jatoolsPrinter.print(myDoc,false);
						// 直接打印，不弹出打印机设置对话框        
			}
	});
}
//两客一危
function doPrint2(a,b,c,d,e,f,g,h)  { 
//忻州市道路运输车辆动态监控设备安装如网在线证明
	var myDate = new Date();
	var year = myDate.getFullYear();    //获取完整的年份(4位,1970-????)
	var month = myDate.getMonth()+1;       //获取当前月份(0-11,0代表1月)
	var day = myDate.getDate();       //获取当前日(1-31)
	alertMsg.confirm("确定打印！", {
			okCall: function(){
				//$.post(url, data, DWZ.ajaxDone, "json");
					var myDoc ={  
						marginIgnored:true,
						settings:{        
							paperWidth : 2100,
							paperHeight : 990,
							orientation : 1 
							},
						documents:{html:['<div style="margin-top:28px;padding-top:3px;margin-left:575px;background:red;width:270px;"><img src="themes/default/images/liang.png" alt="两客一危"/></div><div style="margin-top:115px;margin-left:503px;width:230px;background:green;">'+a+'</div><div style="margin-top:50px;margin-left:184px;width:155px;background:green;float:left;">冀东启明车联网服务</div><div style="margin-top:40px;margin-left:199px;width:200px;background:green;float:left;">'+c+'</div><div style="margin-top:90px;margin-left:-551px;width:120px;background:green;float:left;">'+d+'</div><div style="margin-top:90px;margin-left:-308px;width:225px;background:green;float:left;">'+e+'</div><div style="margin-top:132px;margin-left:140px;width:200px;background:green;">'+f+'</div><div style="margin-top:28px;margin-left:162px;width:200px;background:green;">'+g+'</div><div style="position:absolute;margin-top:278px;margin-left:-253px;width:200px;background:green;">'+h+'</div><div style="margin-top:403px;margin-left:455px;width:60px;background:green;float:left;">'+year+'</div><div style="margin-top:403px;margin-left:20px;width:37px;background:green;float:left;">'+month+'</div><div style="margin-top:403px;margin-left:20px;width:37px;background:green;float:left;">'+day+'</div><div style="margin-top:70px;margin-left:130px;background:red;width:20px;height:150px;float:left;">'+b+'</div>']},   // 要打印的div 对象在本文档中，控件将从本文档中的 id 为 'page1' 的div对象，作为首页打印 
						copyrights:'杰创软件拥有版权  www.jatools.com'          // 版权声明,必须  
						};  
						jatoolsPrinter.print(myDoc,false);
						// 直接打印，不弹出打印机设置对话框        
			}
	});
}

//卫星定位装置安装凭证(繁峙)
function doPrint3(a,b,c,d,e,f,g,h,i,j,k,l,m,n)  { 
	var myDate = new Date();
	var year = myDate.getFullYear();    //获取完整的年份(4位,1970-????)
	var month = myDate.getMonth()+1;       //获取当前月份(0-11,0代表1月)
	var day = myDate.getDate();       //获取当前日(1-31)
	alertMsg.confirm("确定打印！", {
			okCall: function(){
				//$.post(url, data, DWZ.ajaxDone, "json");
					var myDoc ={  
						marginIgnored:true,
						settings:{        
							paperWidth : 2100,
							paperHeight : 990,
							orientation : 1 
							},
						documents:{html:['<div style="margin-top:270px;margin-left:460px;background:blue;width:66px;float:left;font-size:18px;">编号：</div><div style="margin-top:273px;margin-left:3px;background:blue;width:189px;float:left;">'+e+'</div><div style="clear:both;"></div><div style="margin-top:68px;margin-left:180px;width:225px;background:green;">'+a+'</div><div style="clear:both;margin-top:54px;margin-left:245px;width:205px;background:green;">冀东启明车联网服务</div><div style="margin-top:20px;margin-left:242px;width:105px;background:green;float:left;">'+b+'</div><div style="margin-top:20px;margin-left:120px;width:230px;background:green;float:left;">'+c+'</div><div style="margin-top:62px;margin-left:245px;width:260px;background:green;">'+d+'</div><div style="clear:both;font-size:18px;margin-top:71px;margin-left:160px;width:91px;background:blue;float:left;">车主/业主:</div><div style="margin-top:72px;margin-left:3px;width:181px;background:blue;float:left;">'+f+'</div><div style="font-size:18px;margin-top:71px;margin-left:5px;width:77px;background:blue;float:left;">手机号:</div><div style="margin-top:72px;margin-left:3px;width:125px;background:blue;float:left;">'+g+'</div><div style="clear:both;"></div><div style="clear:both;font-size:18px;margin-top:10px;margin-left:160px;width:68px;background:blue;float:left;">联系人:</div><div style="margin-top:12px;margin-left:3px;width:181px;background:blue;float:left;">'+h+'</div><div style="font-size:18px;margin-top:11px;margin-left:28px;width:77px;background:blue;float:left;">手机号:</div><div style="margin-top:11px;margin-left:3px;width:125px;background:blue;float:left;">'+i+'</div><div style="clear:both;"></div><div style="clear:both;font-size:18px;margin-top:10px;margin-left:160px;width:120px;background:blue;float:left;">终端厂家编号:</div><div style="margin-top:11px;margin-left:3px;width:144px;background:blue;float:left;">'+l+'</div><div style="font-size:18px;margin-top:10px;margin-left:12px;width:81px;background:blue;float:left;">终端型号:</div><div style="margin-top:11px;margin-left:3px;width:125px;background:blue;float:left;">'+m+'</div><div style="clear:both;"></div><div style="clear:both;font-size:18px;margin-top:10px;margin-left:160px;width:125px;background:blue;float:left;">终端SIM卡号:</div><div style="margin-top:11px;margin-left:3px;width:374px;background:blue;float:left;">'+n+'</div><div style="clear:both;"></div><div style="font-size:18px;margin-top:10px;margin-left:159px;width:117px;background:blue;float:left;">连接平台名称:</div><div style="margin-top:11px;margin-left:3px;width:369px;background:blue;float:left;">冀东启明车联网服务平台</div><div style="clear:both;"></div><div style="clear:both;font-size:18px;margin-top:10px;margin-left:158px;width:119px;background:blue;float:left;">车辆品牌型号:</div><div style="margin-top:11px;margin-left:3px;width:368px;background:blue;float:left;">'+k+'</div><div style="clear:both;"></div><div style="margin-top:114px;margin-left:460px;width:60px;background:green;float:left;">'+year+'</div><div style="margin-top:114px;margin-left:20px;width:37px;background:green;float:left;">'+month+'</div><div style="margin-top:114px;margin-left:16px;width:37px;background:green;float:left;">'+day+'</div>']},   // 要打印的div 对象在本文档中，控件将从本文档中的 id 为 'page1' 的div对象，作为首页打印 
						copyrights:'杰创软件拥有版权  www.jatools.com'          // 版权声明,必须  
						};  
						jatoolsPrinter.print(myDoc,false);
						// 直接打印，不弹出打印机设置对话框        
			}
	});
}
//道路运输经营着安装声明
function doPrint4(a,b,c,d)  { 
	var myDate = new Date();
	var year = myDate.getFullYear();    //获取完整的年份(4位,1970-????)
	var month = myDate.getMonth()+1;       //获取当前月份(0-11,0代表1月)
	var day = myDate.getDate();       //获取当前日(1-31)
	alertMsg.confirm("确定打印！", {
			okCall: function(){
				//$.post(url, data, DWZ.ajaxDone, "json");
					var myDoc ={  
						marginIgnored:true,
						settings:{        
							paperWidth : 2100,
							paperHeight : 990,
							orientation : 1 
							},
						documents:{html:['<div style="margin-top:268px;margin-left:175px;width:160px;background:green;">原平市</div><div style="margin-top:27px;margin-left:340px;width:140px;background:green;">'+a+'</div><div style="margin-top:103px;margin-left:275px;width:455px;background:green;">'+b+'</div><div style="margin-top:30px;margin-left:275px;width:455px;background:green;">'+c+'</div><div style="margin-top:27px;margin-left:275px;width:455px;background:green;">冀东启明车联网服务</div><div style="margin-top:362px;margin-left:495px;width:60px;background:green;float:left;">'+year+'</div><div style="margin-top:362px;margin-left:20px;width:37px;background:green;float:left;">'+month+'</div><div style="margin-top:362px;margin-left:27px;width:37px;background:green;float:left;">'+day+'</div>']},   // 要打印的div 对象在本文档中，控件将从本文档中的 id 为 'page1' 的div对象，作为首页打印 
						copyrights:'杰创软件拥有版权  www.jatools.com'          // 版权声明,必须  
						};  
						jatoolsPrinter.print(myDoc,false);
						// 直接打印，不弹出打印机设置对话框        
			}
	});
}

//卫星定位装置安装凭证(原平)
function doPrint5(a,b,c,d)  { 
	var myDate = new Date();
	var year = myDate.getFullYear();    //获取完整的年份(4位,1970-????)
	var month = myDate.getMonth()+1;       //获取当前月份(0-11,0代表1月)
	var day = myDate.getDate();       //获取当前日(1-31)
	alertMsg.confirm("确定打印！", {
			okCall: function(){
				//$.post(url, data, DWZ.ajaxDone, "json");
					var myDoc ={  
						marginIgnored:true,
						settings:{        
							paperWidth : 2100,
							paperHeight : 990,
							orientation : 1 
							},
						documents:{html:['<div style="margin-top:364px;margin-left:180px;width:225px;background:green;">'+a+'</div><div style="margin-top:54px;margin-left:245px;width:205px;background:green;">冀东启明车联网服务</div><div style="margin-top:20px;margin-left:242px;width:105px;background:green;float:left;">'+b+'</div><div style="margin-top:20px;margin-left:120px;width:230px;background:green;float:left;">'+c+'</div><div style="margin-top:62px;margin-left:245px;width:260px;background:green;">'+d+'</div><div style="margin-top:370px;margin-left:460px;width:60px;background:green;float:left;">'+year+'</div><div style="margin-top:370px;margin-left:20px;width:37px;background:green;float:left;">'+month+'</div><div style="margin-top:370px;margin-left:16px;width:37px;background:green;float:left;">'+day+'</div>']},   // 要打印的div 对象在本文档中，控件将从本文档中的 id 为 'page1' 的div对象，作为首页打印 
						copyrights:'杰创软件拥有版权  www.jatools.com'          // 版权声明,必须  
						};  
						jatoolsPrinter.print(myDoc,false);
						// 直接打印，不弹出打印机设置对话框        
			}
	});
}
//祁县前装
function doPrintqian(a,b,c,d,e,f,g,h,i,j,k,l,m,n,p,q)  {  
	var myDate = new Date();
	var year = myDate.getFullYear();    //获取完整的年份(4位,1970-????)
	var month = myDate.getMonth()+1;       //获取当前月份(0-11,0代表1月)
	var day = myDate.getDate();       //获取当前日(1-31)
	alertMsg.confirm("确定打印！", {
			okCall: function(){
				//$.post(url, data, DWZ.ajaxDone, "json");
					var myDoc ={  
						marginIgnored:true,
						settings:{        
							paperWidth : 2100,
							paperHeight : 990,
							orientation : 1 
							},
						documents:{html:['<div style="margin-top:181px;margin-left:500px;width:140px;height:35px;background:green;float:left;"><div style="padding-top:8px;">'+a+'</div></div><div position: absolute; top:10px;left:10px;></div><div style="margin-top:275px;margin-left:-475px;width:120px;height:35px;background:green;float:left;">'+b+'</div><div style="margin-top:275px;margin-left:-245px;width:315px;height:35px;background:green;float:left;">'+c+'</div><div position: absolute; top:10px;left:10px;></div><div style="margin-top:325px;margin-left:-501px;width:100px;height:40px;background:green;float:left;">'+d+'</div><div style="margin-top:325px;margin-left:-316px;width:315px;height:35px;background:green;float:left;">'+e+'</div><div position: absolute; top:10px;left:10px;></div><div style="margin-top:375px;margin-left:-501px;width:200px;height:35px;background:green;float:left;">'+f+'</div><div style="margin-top:375px;margin-left:-231px;width:231px;height:35px;background:green;float:left;">'+g+'</div><div position: absolute; top:10px;left:10px;></div><div style="margin-top:425px;margin-left:-501px;width:500px;height:35px;background:green;float:left;">'+h+'</div><div position: absolute; top:10px;left:10px;></div><div style="margin-top:480px;margin-left:-501px;width:200px;height:35px;background:green;float:left;">'+i+'</div><div style="margin-top:480px;margin-left:-146px;width:160px;height:35px;background:green;float:left;">'+j+'</div><div position: absolute; top:10px;left:10px;></div><div style="margin-top:530px;margin-left:-515px;width:200px;height:35px;background:green;float:left;">BD/GPS</div><div style="margin-top:530px;margin-left:-161px;width:160px;height:35px;background:green;float:left;">GSM</div><div style="position:absolute; top:538px;left:747px; width:17px;height:120px;background:green;">'+q+'</div><div position: absolute; top:10px;left:10px;></div><div style="margin-top:580px;margin-left:-515px;width:200px;height:35px;background:green;float:left;">'+k+'</div><div style="margin-top:580px;margin-left:-161px;width:160px;height:35px;background:green;float:left;">'+l+'</div><div position: absolute; top:10px;left:10px;></div><div style="margin-top:630px;margin-left:-515px;width:200px;height:35px;background:green;float:left;">'+m+'</div><div style="margin-top:630px;margin-left:-161px;width:160px;height:35px;background:green;float:left;">'+n+'</div><div position: absolute; top:10px;left:10px;></div><div style="margin-top:680px;margin-left:-515px;width:200px;height:35px;background:green;float:left;">'+p+'</div><div style="margin-top:680px;margin-left:-161px;width:160px;height:35px;background:green;float:left;">4001010556</div><div position: absolute; top:10px;left:10px;></div><div position: absolute; top:10px;left:10px;></div><div style="margin-top:1000px;margin-left:-252px;width:50px;height:35px;background:blue;float:left;">'+year+'</div><div style="margin-top:1000px;margin-left:-205px;width:50px;height:35px;background:blue;float:left;">'+month+'</div><div style="margin-top:1000px;margin-left:-145px;width:50px;height:35px;background:green;float:left;">'+day+'</div>']},   // 要打印的div 对象在本文档中，控件将从本文档中的 id 为 'page1' 的div对象，作为首页打印 
						copyrights:'杰创软件拥有版权  www.jatools.com'          // 版权声明,必须  
						};  
						jatoolsPrinter.print(myDoc,false);
						// 直接打印，不弹出打印机设置对话框        
			}
	});
}

function dbltable(target,rel){
	if(target=='rid'){
		$.pdialog.open("index.php?action=shenyan&rid="+rel,"pdialogid","明细",{max:true,mask:false,width:500,height:300});
	}
}