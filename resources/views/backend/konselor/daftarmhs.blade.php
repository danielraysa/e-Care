@extends('backend.partialadmin.layout')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Patients List</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Patients</a>
                                </li>
                                <li class="breadcrumb-item active">All Patients
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12">
                    <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                        <button class="btn btn-info round dropdown-toggle dropdown-menu-right box-shadow-2 px-2 mb-1" id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ft-settings icon-left"></i> Settings</button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"><a class="dropdown-item" href="card-bootstrap.html">Cards</a><a class="dropdown-item" href="component-buttons-extended.html">Buttons</a></div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- List Of All Patients -->

                <section id="patients-list">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h2 class="card-title">Patients List</h2>
                                    <div class="heading-elements">
                                        <a href="hospital-add-patient.html" class="btn btn-danger round btn-sm"><i class="la la-plus font-small-2"></i>
                                            Add
                                            Patient</a>
                                    </div>
                                </div>
                                <div class="card-body collapse show">
                                    <div class="card-body card-dashboard">
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered patients-list">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Disease</th>
                                                    <th>Location</th>
                                                    <th>Age</th>
                                                    <th>Previous Visit</th>
                                                    <th>Amount Due</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Phil Gray</td>
                                                    <td>Dental</td>
                                                    <td>New York</td>
                                                    <td>25</td>
                                                    <td>2018/04/25</td>
                                                    <td>$1000</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Irene Baker</td>
                                                    <td>Skin Problem</td>
                                                    <td>Texas</td>
                                                    <td>30</td>
                                                    <td>2018/07/25</td>
                                                    <td>$800</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Evan White</td>
                                                    <td>Surgeory</td>
                                                    <td>San Francisco</td>
                                                    <td>66</td>
                                                    <td>2018/01/12</td>
                                                    <td>$10000</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Sonia Clark</td>
                                                    <td>Psychological</td>
                                                    <td>Queens</td>
                                                    <td>22</td>
                                                    <td>2018/03/29</td>
                                                    <td>$1500</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Colin Welch</td>
                                                    <td>Pediatric</td>
                                                    <td>Washington</td>
                                                    <td>33</td>
                                                    <td>2018/11/28</td>
                                                    <td>$200</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Zoe Duncan</td>
                                                    <td>Allergy</td>
                                                    <td>New York</td>
                                                    <td>28</td>
                                                    <td>2018/12/02</td>
                                                    <td>$720</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Phil Short</td>
                                                    <td>Hearing Problem</td>
                                                    <td>Brooklyn</td>
                                                    <td>23</td>
                                                    <td>2018/08/06</td>
                                                    <td>$5700</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Jane Smith</td>
                                                    <td>Common Cold</td>
                                                    <td>Manhattan</td>
                                                    <td>35</td>
                                                    <td>2018/10/14</td>
                                                    <td>$327</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Max Taylor</td>
                                                    <td>Digestive</td>
                                                    <td>San Francisco</td>
                                                    <td>32</td>
                                                    <td>2018/09/15</td>
                                                    <td>$205</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Sonya Frost</td>
                                                    <td>Dental</td>
                                                    <td>Edinburgh</td>
                                                    <td>23</td>
                                                    <td>2018/12/13</td>
                                                    <td>$103</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Diane Paige</td>
                                                    <td>Physcial</td>
                                                    <td>Texas</td>
                                                    <td>30</td>
                                                    <td>2018/12/19</td>
                                                    <td>$905</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Liam Morgan</td>
                                                    <td>High Fever</td>
                                                    <td>Nebraska</td>
                                                    <td>22</td>
                                                    <td>2013/03/03</td>
                                                    <td>$142</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Maria Bower</td>
                                                    <td>Migraine</td>
                                                    <td>San Francisco</td>
                                                    <td>36</td>
                                                    <td>2018/10/16</td>
                                                    <td>$470</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Haley Kennedy</td>
                                                    <td>Skin Problem</td>
                                                    <td>London</td>
                                                    <td>43</td>
                                                    <td>2018/12/18</td>
                                                    <td>$313</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Tatyana Fitzpatrick</td>
                                                    <td>Allergy</td>
                                                    <td>London</td>
                                                    <td>19</td>
                                                    <td>2018/03/17</td>
                                                    <td>$385</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Michael Silva</td>
                                                    <td>Physcial</td>
                                                    <td>London</td>
                                                    <td>66</td>
                                                    <td>2018/11/27</td>
                                                    <td>$198</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Paul Byrd</td>
                                                    <td>Common Cold</td>
                                                    <td>New York</td>
                                                    <td>64</td>
                                                    <td>2018/06/09</td>
                                                    <td>$125</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Gloria Little</td>
                                                    <td>Common Cold</td>
                                                    <td>New York</td>
                                                    <td>59</td>
                                                    <td>2018/04/10</td>
                                                    <td>$237</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Bradley Greer</td>
                                                    <td>Pediatric</td>
                                                    <td>London</td>
                                                    <td>41</td>
                                                    <td>2018/10/13</td>
                                                    <td>$132</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Dai Rios</td>
                                                    <td>Dental</td>
                                                    <td>Edinburgh</td>
                                                    <td>35</td>
                                                    <td>2018/09/26</td>
                                                    <td>$217</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Jenette Caldwell</td>
                                                    <td>Hearing Problem</td>
                                                    <td>New York</td>
                                                    <td>30</td>
                                                    <td>2018/09/03</td>
                                                    <td>$345</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Yuri Berry</td>
                                                    <td>Migraine</td>
                                                    <td>New York</td>
                                                    <td>40</td>
                                                    <td>2018/06/25</td>
                                                    <td>$675</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Caesar Vance</td>
                                                    <td>Skin Problem</td>
                                                    <td>New York</td>
                                                    <td>21</td>
                                                    <td>2018/12/12</td>
                                                    <td>$106</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Doris Wilder</td>
                                                    <td>Pediatric</td>
                                                    <td>Sidney</td>
                                                    <td>23</td>
                                                    <td>2018/09/20</td>
                                                    <td>$856</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Angelica Ramos</td>
                                                    <td>Dental</td>
                                                    <td>London</td>
                                                    <td>47</td>
                                                    <td>2018/10/09</td>
                                                    <td>$200</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Gavin Joyce</td>
                                                    <td>Surgeon</td>
                                                    <td>Edinburgh</td>
                                                    <td>42</td>
                                                    <td>2018/12/22</td>
                                                    <td>$925</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Jennifer Chang</td>
                                                    <td>Psychological</td>
                                                    <td>Singapore</td>
                                                    <td>28</td>
                                                    <td>2018/11/14</td>
                                                    <td>$357</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Brenden Wagner</td>
                                                    <td>Allergy</td>
                                                    <td>San Francisco</td>
                                                    <td>28</td>
                                                    <td>2018/06/07</td>
                                                    <td>$206</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Fiona Green</td>
                                                    <td>Skin Problem</td>
                                                    <td>San Francisco</td>
                                                    <td>48</td>
                                                    <td>2018/03/11</td>
                                                    <td>$850</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Shou Itou</td>
                                                    <td>Digestive</td>
                                                    <td>Tokyo</td>
                                                    <td>20</td>
                                                    <td>2018/08/14</td>
                                                    <td>$163</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Michelle House</td>
                                                    <td>Common Cold</td>
                                                    <td>Sidney</td>
                                                    <td>37</td>
                                                    <td>2018/06/02</td>
                                                    <td>$954</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Suki Burks</td>
                                                    <td>Surgeon</td>
                                                    <td>London</td>
                                                    <td>53</td>
                                                    <td>2018/10/22</td>
                                                    <td>$114</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Prescott Bartlett</td>
                                                    <td>Common Cold</td>
                                                    <td>London</td>
                                                    <td>27</td>
                                                    <td>2018/05/07</td>
                                                    <td>$145</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Gavin Cortez</td>
                                                    <td>Physcial</td>
                                                    <td>San Francisco</td>
                                                    <td>22</td>
                                                    <td>2018/10/26</td>
                                                    <td>$230</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Martena Mccray</td>
                                                    <td>Dental</td>
                                                    <td>Edinburgh</td>
                                                    <td>46</td>
                                                    <td>2018/03/09</td>
                                                    <td>$324</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Unity Butler</td>
                                                    <td>Pediatric</td>
                                                    <td>San Francisco</td>
                                                    <td>47</td>
                                                    <td>2018/12/09</td>
                                                    <td>$856</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Howard Hatfield</td>
                                                    <td>Allergy</td>
                                                    <td>San Francisco</td>
                                                    <td>51</td>
                                                    <td>2018/12/16</td>
                                                    <td>$164</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Hope Fuentes</td>
                                                    <td>Hearing Problem</td>
                                                    <td>San Francisco</td>
                                                    <td>41</td>
                                                    <td>2018/02/12</td>
                                                    <td>$109</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Vivian Harrell</td>
                                                    <td>Common Cold</td>
                                                    <td>San Francisco</td>
                                                    <td>62</td>
                                                    <td>2018/02/14</td>
                                                    <td>$452</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Timothy Mooney</td>
                                                    <td>Allergy</td>
                                                    <td>London</td>
                                                    <td>37</td>
                                                    <td>2018/12/11</td>
                                                    <td>$136</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Jackson Bradshaw</td>
                                                    <td>Allergy</td>
                                                    <td>New York</td>
                                                    <td>65</td>
                                                    <td>2018/09/26</td>
                                                    <td>$645</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Olivia Liang</td>
                                                    <td>Skin Problem</td>
                                                    <td>Singapore</td>
                                                    <td>64</td>
                                                    <td>2018/02/03</td>
                                                    <td>$234</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Bruno Nash</td>
                                                    <td>Allergy</td>
                                                    <td>London</td>
                                                    <td>38</td>
                                                    <td>2018/05/03</td>
                                                    <td>$163</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Sakura Yamamoto</td>
                                                    <td>Skin Problem</td>
                                                    <td>Tokyo</td>
                                                    <td>37</td>
                                                    <td>2018/08/19</td>
                                                    <td>$139</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Thor Walton</td>
                                                    <td>Surgeon</td>
                                                    <td>New York</td>
                                                    <td>61</td>
                                                    <td>2013/08/11</td>
                                                    <td>$98</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Finn Camacho</td>
                                                    <td>Skin Problem</td>
                                                    <td>San Francisco</td>
                                                    <td>47</td>
                                                    <td>2018/07/07</td>
                                                    <td>$870</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Serge Baldwin</td>
                                                    <td>Hearing Problem</td>
                                                    <td>Singapore</td>
                                                    <td>64</td>
                                                    <td>2018/04/09</td>
                                                    <td>$138</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Zenaida Frank</td>
                                                    <td>Allergy</td>
                                                    <td>New York</td>
                                                    <td>63</td>
                                                    <td>2018/01/04</td>
                                                    <td>$125</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Zorita Serrano</td>
                                                    <td>Allergy</td>
                                                    <td>San Francisco</td>
                                                    <td>56</td>
                                                    <td>2018/06/01</td>
                                                    <td>$115</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Jennifer Acosta</td>
                                                    <td>Surgeon</td>
                                                    <td>Edinburgh</td>
                                                    <td>43</td>
                                                    <td>2013/02/01</td>
                                                    <td>$75</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Cara Stevens</td>
                                                    <td>Pediatric</td>
                                                    <td>New York</td>
                                                    <td>46</td>
                                                    <td>2018/12/06</td>
                                                    <td>$145</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Hermione Butler</td>
                                                    <td>Psychological</td>
                                                    <td>London</td>
                                                    <td>47</td>
                                                    <td>2018/03/21</td>
                                                    <td>$356</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Lael Greer</td>
                                                    <td>Surgeon</td>
                                                    <td>London</td>
                                                    <td>21</td>
                                                    <td>2018/02/27</td>
                                                    <td>$103</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Jonas Alexander</td>
                                                    <td>Surgeon</td>
                                                    <td>San Francisco</td>
                                                    <td>30</td>
                                                    <td>2018/07/14</td>
                                                    <td>$864</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Shad Decker</td>
                                                    <td>Psychological</td>
                                                    <td>Edinburgh</td>
                                                    <td>51</td>
                                                    <td>2018/11/13</td>
                                                    <td>$183</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Michael Bruce</td>
                                                    <td>Surgeon</td>
                                                    <td>Singapore</td>
                                                    <td>29</td>
                                                    <td>2018/06/27</td>
                                                    <td>$183</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Donna Snider</td>
                                                    <td>Physcial</td>
                                                    <td>New York</td>
                                                    <td>27</td>
                                                    <td>2018/01/25</td>
                                                    <td>$112</td>
                                                    <td><a href="#"><i class="ft-edit text-success"></i></a>
                                                        <a href="#"><i class="ft-trash-2 ml-1 text-warning"></i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Disease</th>
                                                    <th>Location</th>
                                                    <th>Age</th>
                                                    <th>Previous Visit</th>
                                                    <th>Amount Due</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->


@endsection