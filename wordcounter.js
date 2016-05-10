
/**
 * Counts the number of words inside string
 * @param {string} string
 * @return {number}
 */
function wordcounter(string)
{
    string = string.trim();

    if (!string)
    {
        return 0;
    }

    var chars =
            '\u2460-\u24ff'+
            '\u2501-\u254f'+
            '\u256c-\u27cf'+
            '\u2e80-\u2fdf'+
            '\u2ff0-\u2fff'+
            '\u3001-\u319f'+
            '\u3400-\ufaff'+
            '\uff00-\uffff';

    var spaces =
            '\u0001-\u0002'+
            '\u0005'+
            '\u0007'+
            '\u0009-\u000b'+
            '\u000d-\u000e'+
            '\u001f-\u0020'+
            '\u00a0'+
            '\u093d'+
            '\u0964-\u0965'+
            '\u0f08-\u0f14'+
            '\u2005'+
            '\u200b-\u200d'+
            '\u2013-\u2014'+
            '\u3000'+
            '\ufdea'+
            '\ufeff';

    var R = 
            {
                count: 0,
        
                chars_regex: new RegExp('['+chars+']', 'g'),
                chars_replace: 
                        function()
                        {
                            R.count++;
                            return ' ';
                        },
                        
                spaces_regex: new RegExp('[^'+spaces+']+', 'g'),
                spaces_replace: 
                        function()
                        {
                            R.count++;
                            return '';
                        }
            };

    string = string.replace(R.chars_regex, R.chars_replace);
    string.replace(R.spaces_regex, R.spaces_replace);

    return R.count;
}
