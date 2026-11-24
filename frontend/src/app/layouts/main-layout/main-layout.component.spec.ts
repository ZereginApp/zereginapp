import { ComponentFixture, TestBed } from '@angular/core/testing';
import { provideRouter, RouterModule } from '@angular/router';
import { CommonModule, registerLocaleData } from '@angular/common';
import { Sidebar } from './components/sidebar/sidebar.component';
import { Brand } from './components/brand/brand.component';
import { MainNavigation } from './components/main-navigation/main-navigation.component';
import { UserActions } from './components/user-actions/user-actions.component';
import localeEs from '@angular/common/locales/es';
import { MobileHeader } from './components/mobile-header/mobile-header.component';
import { MobileFooter } from './components/mobile-footer/mobile-footer.component';

import { MainLayout } from './main-layout.component';

registerLocaleData(localeEs);

describe('MainLayout', () => {
  let component: MainLayout;
  let fixture: ComponentFixture<MainLayout>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [
        MainLayout,
        Sidebar,
        MobileHeader,
        MobileFooter,
        Brand,
        MainNavigation,
        UserActions,
      ],
      imports: [CommonModule, RouterModule],
      providers: [provideRouter([])],
    }).compileComponents();

    fixture = TestBed.createComponent(MainLayout);
    component = fixture.componentInstance;
    await fixture.whenStable();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
