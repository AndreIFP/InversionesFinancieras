$(function(){
    countLines("dupe");
      var slideHeight = $('.Power td').css('lineHeight').replace('px','') * 3;
      var defHeight = $('.Power td').css('height');
      var borderDefault = $('.Power th').css('borderBottom');
      $('.Power td').each(function(){	
          var powerRow = $(this);
              powerRow.css('height', slideHeight + 'px');
              var powerParent = powerRow.parent();
              powerParent.after('<tr class="read-more"><th></th><td >Click to Read More</td></tr>');
              powerParent.children().css('borderBottom', 'none');	
              var readMore = powerParent.next();
              readMore.on('click',function(){
                  var curHeight = powerRow.height();
                  if(curHeight == slideHeight){
                      powerRow.animate({
                        height: defHeight
                      }, "normal");
                      readMore.find('td').html('Less');		
                  }else{
                      powerRow.animate({
                        height: slideHeight
                      }, "normal");
                      readMore.find('td').html('Click to Read More');			
                  }
                  return false;
              });
          });
      });
  
  function countLines(elementId) {
      var divHeight = document.getElementById(elementId).clientHeight;
      var lineHeight = getStyle(elementId, 'line-height').replace('px','');
      var lines = divHeight / lineHeight;
      alert("Lines(" + divHeight + "/" +  lineHeight + "): " + lines);
  }
  
  function getStyle(el,styleProp)
  {
      var x = document.getElementById(el);
      if (x.currentStyle)
          var y = x.currentStyle[styleProp];
      else if (window.getComputedStyle)
          var y = document.defaultView.getComputedStyle(x,null).getPropertyValue(styleProp);
      return y;
  }