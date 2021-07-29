var mongoose = require("mongoose");

// Save a reference to the Schema constructor
var Schema = mongoose.Schema;

// Using the Schema constructor, create a new NoteSchema object
// This is similar to a Sequelize model
var ProjectSchema = new Schema({
  // `title` must be of type String
  name: { type: String, index: { unique: true }},
  info: String,
  date:String,
  category: String,
  videos: [String],
  images: [String]


});

// This creates our model from the above schema, using mongoose's model method
var Projects = mongoose.model("Projects", ProjectSchema);

// Export the Note model
module.exports = Projects;