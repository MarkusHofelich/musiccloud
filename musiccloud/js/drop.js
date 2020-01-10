var multer   =  require( 'multer' );
var upload   =  multer( { dest: 'uploads/' } );
require( 'string.prototype.startswith' );

var app = express();

app.use( express.static( __dirname + '/bower_components' ) );

app.engine( '.hbs', exphbs( { extname: '.hbs' } ) );
app.set('view engine', '.hbs');

app.get( '/', function( req, res, next ){
  return res.render( 'index' );
});

app.post( '/upload', upload.single( 'file' ), function( req, res, next ) {

  if ( !req.file.mimetype.startsWith( 'audio/' ) ) {
    return res.status( 422 ).json( {
      error : 'Das muss eine Audio Datei sein !'
    } );
  }

  var dimensions = sizeOf( req.file.path );

  return res.status( 200 ).send( req.file );
});

app.listen( 8080, function() {
  console.log( 'Express server listening on port 8080' );
});