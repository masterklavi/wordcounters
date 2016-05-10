
phantom.injectJs('../wordcounter.js');

var data = provider();

for (var i in data)
{
    test(data[i][0], data[i][1], data[i][2]);
}

phantom.exit();



function test(comment, count, string)
{
    var returned = wordcounter(string);
    
    if (returned == count)
    {
        console.log(comment + ' +');
    }
    else
    {
        console.log(comment + ' F, ' + returned + ' != ' + count);
    }
}

function provider()
{
    var fs = require('fs');
    
    var data = {};

    // table
    var list = fs.list('data/table');
    for (var k in list)
    {
        var m = list[k].match(/^([\da-f])_(\d+)\.txt$/);
        
        if (!m)
        {
            continue;
        }

        var comment = 'table-' + m[1];
        var count = m[2];
        var string = fs.read('data/table/' + list[k]);

        data[comment] = [comment, count, string];
    }
    
    return data;
}
