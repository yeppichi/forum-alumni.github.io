<!--start sidebar -->
       <aside class="sidebar-wrapper" data-simplebar="true">
          <div class="sidebar-header">
            <div>
              <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
            </div>
            <div>
              <h4 class="logo-text">Skodash</h4>
            </div>
            <div class="toggle-icon ms-auto"><i class="bi bi-chevron-double-left"></i>
            </div>
          </div>
          <!--navigation-->
          <ul class="metismenu" id="menu">
            <li>
              <a href="/admin">
                <div class="parent-icon"><i class="bi bi-house-door"></i>
                </div>
                <div class="menu-title">Dashboard</div>
              </a>
            </li>
            {{-- <li>
              <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-grid"></i>
                </div>
                <div class="menu-title">Application</div>
              </a>
            </li> --}}
            {{-- <li class="menu-label">UI Elements</li> --}}
            <li>
              <a href="{{ route('admin.user.index') }}">
                <div class="parent-icon"><i class="bi bi-people-fill"></i>
                </div>
                <div class="menu-title">Users</div>
              </a>
            </li>
            <li>
              <a href="{{ route('admin.category.index') }}">
                <div class="parent-icon"><i class="lni lni-book"></i>
                </div>
                <div class="menu-title">Category Profiles</div>
              </a>
            </li>
            <li>
              <a href="{{ route('admin.profile.index') }}">
                <div class="parent-icon"><i class="lni lni-book"></i>
                </div>
                <div class="menu-title">Profiles</div>
              </a>
            </li>
            <li>
              <a href="{{ route('admin.discuss.index') }}">
                <div class="parent-icon"><i class="lni lni-bubble"></i>
                </div>
                <div class="menu-title">Discussions</div>
              </a>
            </li>
            <li>
              <a href="{{ route('admin.topic.index') }}">
                <div class="parent-icon"><i class="fas fa-list"></i>
                </div>
                <div class="menu-title">Topics</div>
              </a>
            </li>
          </ul>
          <!--end navigation-->
       </aside>
       <!--end sidebar -->