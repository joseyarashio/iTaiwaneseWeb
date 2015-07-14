(table2graph = function(){

  /* variables */
  var triggerClass = 'tochart';
  var chartClass = 'fromtable';
  var hideClass = 'hidden';
  var chartColor = '339933';
  var chartSize = '450x150';
  
  var toTableClass = 'totable';
  var tableClass = 'generatedfromchart';
  /* end variables */

  var tables = document.getElementsByTagName('table');
  var sizeCheck = /\s?size([^\s]+)/;
  var colCheck = /\s?color([^\s]+)/;
  for(var i=0;tables[i];i++){
    var t = tables[i];
    var c = t.className;
    var data = [];
    var labels = []
    if(c.indexOf(triggerClass) !== -1){
      var size = sizeCheck.exec(c);
      size = size ? size[1] : chartSize;
      var col = colCheck.exec(c);
      col = col ? col[1] : chartColor;
      var charturl = 'http://chart.apis.google.com/chart?cht=p3&chco=' + col + '&chs=' + size + '&chd=t:';
      t.className += ' '+ hideClass;
      var tds = t.getElementsByTagName('tbody')[0].getElementsByTagName('td');
      for(var j=0;tds[j];j+=2){
        labels.push(tds[j].innerHTML);
        data.push(tds[j+1].innerHTML);
      };
      var chart = document.createElement('img');
      chart.setAttribute('src',charturl+data.join(',') + '&chl=' + labels.join('|'));
      chart.setAttribute('alt',t.getAttribute('summary'));
      chart.className = chartClass;
      t.parentNode.insertBefore(chart,t);
    };
  };
  
  /* convert charts to tables */
  var charts = document.getElementsByTagName('img');
  for(var i=0;charts[i];i++){
    if(charts[i].className.indexOf(toTableClass) !== -1){
      var t = document.createElement('table');
      var tbody = document.createElement('tbody');
      var data = charts[i].getAttribute('src');
      var th,td,tr;
      var values = data.match(/chd=t:([^&]+)&?/)[1];
      var labels = data.match(/chl=([^&]+)&?/)[1];
      var l = labels.split('|');
      var v = values.split(',');
      for(var j=0;l[j];j++){
        tr = document.createElement('tr');
        th = document.createElement('th');
        th.appendChild(document.createTextNode(l[j]));
        th.setAttribute('scope','row');
        td = document.createElement('td');
        td.appendChild(document.createTextNode(v[j]));
        tr.appendChild(th);
        tr.appendChild(td);
        tbody.appendChild(tr);
      };
      t.appendChild(tbody);
      t.setAttribute('summary',charts[i].getAttribute('alt'));
      charts[i].parentNode.insertBefore(t,charts[i]);
      charts[i].setAttribute('alt','');
      t.className = tableClass;
    };
  };
  
}());
