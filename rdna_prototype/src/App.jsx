import React, { Component } from "react";
import ReactDOM from 'react-dom';
import Header from './components/Header.jsx';
import Menu from './components/Menu.jsx';
import ProjectBox from './components/ProjectBox.jsx';
const axios = require('axios'); // Use axios to make http requests
import FlipMove from 'react-flip-move';


// Main Entry point function=
class App extends Component {
    constructor(props) {
        super(props);
        this.state = {
            menuOptions: ["Development",  "Resume"],
            activeMenu: 0,
            moveToLeft: false,
            section: "",
            projectList: [],
            hoverProj: 0,
            pointerControl: "menu",
            waitingOnProjectList: false,
            projectSelected: false,
            project: 0

        };
        this.textToRead = React.createRef();
        this.site = React.createRef();


    }

    changeHoverMenu = (index) => {
        this.setState({ activeMenu: index })
    }
    changeHoverProject = (index) => {
        this.setState({ hoverProj: index })
    }
    loadProject = (index) => {
        if (this.state.projectList[index].name == "Full Resume PDF") {
            this.resume.click()
        } else {
            this.setState({
                pointerControl: "project",
                project: index,
                projectSelected: true
            }, () => {
                this.textToRead.current.focus()
            })
        }


    }


    // simulateClick = (e) =>{
    // e.focus()
    // }
    listProjects = (index) => {
        this.setState({ moveToLeft: true, projectSelected: false })
        this.setState({ section: index })
        this.setState({ pointerControl: "projects" })
        this.setState({ hoverProj: 0 })
        this.setState({ waitingOnProjectList: true })
        axios.get("/api/projects/" + this.state.menuOptions[index]).then(
            data => {
                // console.log(data)/
                this.setState({ waitingOnProjectList: false })
                this.setState({ projectList: data.data.message })
            })
    }
   

    render() {
        return (
            <div tabindex = "-1" onFocus={() => console.log('focus')} onClick={() => console.log('clicked')} className = "site" ref = {this.site}>
        <Header/>
        <Menu 
            moveToLeft = {this.state.moveToLeft} 
            listProjects = {this.listProjects}
            changeHoverMenu = {this.changeHoverMenu} 
            active = {this.state.activeMenu} 
            menuOptions = {this.state.menuOptions}
            selected = {this.state.section}
            pointerControl = {this.state.pointerControl}

        />
        {this.state.moveToLeft ?
        <ProjectBox
        hover = {this.state.hoverProj}
        list = {this.state.projectList}
        hoverfunc = {this.changeHoverProject}
        category = {this.state.menuOptions[this.state.section]}
        pointerControl = {this.state.pointerControl}
        loading = {this.state.waitingOnProjectList}
        projectSelected = {this.state.projectSelected}
        project = {this.state.project}
        pickProject = {this.loadProject}
        ref = {this.textToRead}
        simulateClick = {this.simulateClick}
        />
        :""}
        <a id =  "resume" ref={input => this.resume = input} href = "/public/pdfs/resume.pdf" style = {{"display":"none"}} target = "_blank"></a>
        </div>
        )
    }
}

// Rendering the entire react application
ReactDOM.render(<App/>, document.getElementById('root'));