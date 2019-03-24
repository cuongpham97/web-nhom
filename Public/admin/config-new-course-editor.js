var config = {
    extraPlugins: 'easyimage',
    cloudServices_tokenUrl: '#',
    cloudServices_uploadUrl: '#'
}
config.toolbarGroups = [
    { name: 'document', groups: ['mode', 'document', 'doctools'] },
    { name: 'editing', groups: ['find', 'selection', 'spellchecker', 'editing'] },
    { name: 'forms', groups: ['forms'] },
    { name: 'basicstyles', groups: ['basicstyles', 'cleanup'] },
    { name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align', 'bidi', 'paragraph'] },
    { name: 'links', groups: ['links'] },
    { name: 'insert', groups: ['insert'] },
    { name: 'styles', groups: ['styles'] },
    { name: 'colors', groups: ['colors'] },
    { name: 'tools', groups: ['tools'] },
    { name: 'others', groups: ['others'] },
    { name: 'about', groups: ['about'] }
];

config.removeButtons = 'Source,Save,NewPage,Print,Templates,SelectAll,Scayt,Textarea,Select,Button,ImageButton,HiddenField,Radio,TextField,Checkbox,Form,Underline,RemoveFormat,CopyFormatting,Outdent,Indent,CreateDiv,Blockquote,BidiLtr,BidiRtl,Language,Anchor,Flash,PageBreak,FontSize,BGColor,ShowBlocks,About';
config.height = 150;
config.removePlugins = 'elementspath';
config.resize_enabled = true;
config.line_height = 0;