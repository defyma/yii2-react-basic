/*jshint esversion: 6 */
/* jshint ignore:start */

import React, { Component } from 'react';

class Header extends Component {

    render() {
        return (
            <nav className="navbar navbar-default">
                <div className="container-fluid">
                    <div className="navbar-header">
                        <button type="button" className="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span className="sr-only">Toggle navigation</span>
                            <span className="icon-bar"></span>
                            <span className="icon-bar"></span>
                            <span className="icon-bar"></span>
                        </button>
                        <a className="navbar-brand" href="#">React APP</a>
                    </div>

                    <div className="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul className="nav navbar-nav">
                            <li className=""><a href={window.__MYSITE__}>Home <span className="sr-only">(current)</span></a></li>
                            <li><a href={window.__MYSITE__ + "index.php?r=site/about"}>About</a></li>
                            <li><a href={window.__MYSITE__ + "index.php?r=contoh/default/index"}>Modular Example</a></li>
                            <li><a href={window.__MYSITE__ + "index.php?r=contoh/produk/view"}>Modular Example 2</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        );
    }
}

export default Header
